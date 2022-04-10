(() => {

	// FIRST you collect your items in any given section
  window.onload = () => {
    const transition_el = document.querySelector('.transition');

	// THIRD you write your function
  setTimeout(() => {
    transition_el.classList.remove('activeTran');
  }, 250);
}

	// SECOND you add your event handling here

})();
