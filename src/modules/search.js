import $ from "jquery";

class Search {
  // init variable
  constructor() {
    this.addSearchHTML();
    this.resultDiv = $(".search-overlay__result");
    this.openButton = $(".js-search-trigger");
    this.closeButton = $(".search-overlay__close");
    this.overlay = $(".search-overlay");
    this.searchTerm = $("#search-term");
    this.event();
    this.isOverlayOpen = 0;
    this.isSpinnerLoaded = 0;
    this.typingTimer;
    this.previousValue;
    this.baseUrl = `${universityData.root_url}/wp-json/wp/v2`;
  }

  //   events
  event() {
    this.openButton.on("click", this.openOverlay.bind(this));
    this.closeButton.on("click", this.closeOverlay.bind(this));
    $(document).on("keydown", this.keyEvents.bind(this));
    this.searchTerm.on("keyup", this.SearchTerm.bind(this));
  }
  // functions
  SearchTerm() {
    if (this.previousValue != this.searchTerm.val()) {
      clearTimeout(this.typingTimer);

      if (this.searchTerm.val()) {
        if (!this.isSpinnerLoaded) {
          this.resultDiv.html(`<div class="spinner-loader"></div>`);
          this.isSpinnerLoaded = 1;
        }
        this.typingTimer = setTimeout(this.searchResult.bind(this), 1000);
      } else {
        this.resultDiv.html("");
        this.isSpinnerLoaded = 0;
      }
    }

    this.previousValue = this.searchTerm.val();
  }

  searchResult() {
    $.when(
      $.getJSON(`${this.baseUrl}/posts?search=${this.searchTerm.val()}`),
      $.getJSON(`${this.baseUrl}/pages?search=${this.searchTerm.val()}`)
    )
      .then((posts, pages) => {
        let combineResult = posts[0].concat(pages[0]);
        this.resultDiv.html(`
  <h2 class="search-overlay__section-title">General Information</h2>
  ${
    combineResult.length > 0
      ? `<ul class="link-list min-list">
  ${combineResult
    .map(
      (item) =>
        `
        <li><a href="${item.link}">${item.title.rendered}</a> ${
          item.type == "post" ? `by ${item.authorName}` : ""
        }  </li>
        `
    )
    .join("")}
    </ul> 
  `
      : "<h6>No Result Found<h6>"
  }


  `);
        this.isSpinnerLoaded = 0;
      })
      .catch((e) => {
        this.resultDiv.html(`
      <h2 class="search-overlay__section-title">Something Went Wrong</h2>`);
      });
  }

  openOverlay() {
    this.overlay.addClass("search-overlay--active");
    $("body").addClass("body-no-scroll");
    this.isOverlayOpen = 1;
    this.searchTerm.val("");
    setTimeout(() => {
      this.searchTerm.focus();
    }, 301);
  }

  closeOverlay() {
    $("body").removeClass("body-no-scroll");
    this.overlay.removeClass("search-overlay--active");
    this.isOverlayOpen = 0;
  }

  keyEvents(e) {
    if (
      e.keyCode == 83 &&
      !this.isOverlayOpen &&
      !$("input,textarea").is(":focus")
    ) {
      this.openOverlay();
    }
    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }

  addSearchHTML() {
    $("body").append(`
      <div class="search-overlay">
    <div class="search-overlay__top">
        <div class="container">
            <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
            <input type="text" placeholder="What are you looking for?" class="search-term" id="search-term">
            <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
        </div>
    </div>
    <div class="container">
        <div class="search-overlay__result" id="search-overlay__result">
        </div>
    </div>
</div>
      `);
  }
}

export default Search;
