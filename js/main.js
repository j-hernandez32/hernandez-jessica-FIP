(() => {

	// FIRST you collect your items in any given section
  window.onload = () => {
  const anchors = document.querySelectorAll('a');
  const transition_el = document.querySelector('.transition');


	// THIRD you write your function
  setTimeout(() => {
    transition_el.classList.remove('activeTran');
  }, 250);

  for (let i = 0; i < anchors.length; i++) {
    const anchor = anchors[i];


	// SECOND you add your event handling here
  anchor.addEventListener('click', e => {
    e.preventDefault();
    let target = e.target.href;

    console.log(transition_el);

    transition_el.classList.add('activeTran');

    console.log(transition_el);

    setInterval(() => {
      window.location.href = target;
    }, 250);
  })
}
}

})();
