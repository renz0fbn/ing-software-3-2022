const btnSwitch = document.querySelector('#switch');

btnSwitch.addEventListener('click', () => {
	document.body.classList.toggle('dark');
	btnSwitch.classList.toggle('active');
	document.getElementById('twitter-widget-0').setAttribute('style', 'dysplay: none !important');
});