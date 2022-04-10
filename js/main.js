(() => {

	// FIRST you collect your items in any given section
  window.onload = () => {
    const transition_el = document.querySelector('.transition');

    let img = document.querySelector('img');
      let start = img.src;
      let hover = img.getAttribute('data-hover');

	// THIRD you write your function

  setTimeout(() => {
    transition_el.classList.remove('activeTran');
  }, 250);
}

	// SECOND you add your event handling here

  img.onmouseover = () => { img.src = hover; }

  img.onmouseout = () => { img.src = start; }

})();
