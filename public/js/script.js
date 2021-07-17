let sign				= document.querySelector(".sign"),
	modalWindowSign		= document.querySelector(".modal-sign"),
	closeWindowSign		= document.querySelector('.close');

if (sign !== null)
{
	let reg_btn				= document.querySelector(".reg_btn"),
		log_btn				= document.querySelector(".log_btn");

	sign.addEventListener('click', function() {
		modalWindowSign.classList.add('active-sign');
	});

	closeWindowSign.addEventListener('click', function(){
		modalWindowSign.classList.remove('active-sign');
	});

//Регистрация ///////////////////////////////////////////
	reg_btn.addEventListener('click', function() {
		console.log('Нажата кнопка регистрации');
		/*
        fetch(window.location.href + 'register', {
            method : 'POST',
            headers: {
                'Content-Type': 'application/json',

            },
            body : JSON.stringify({
                'name' : document.getElementById('regName').value,
                'email' : document.getElementById('regEmail').value,
                'pass' : document.getElementById('regPassword').value
            })

        })
            .then((response) => {
                console.log(response);
            });
         */
		modalWindowSign.classList.remove('active-sign');
	});
//////////////////////////////////////////////////////////

//Авторизация ///////////////////////////////////////////
	log_btn.addEventListener('click', function() {
		console.log('Нажата кнопка авторизации');
		modalWindowSign.classList.remove('active-sign');
	});
}
else {
	let logout				= document.querySelector(".logout"),
		change_password		= document.querySelector(".change_password"),
		pop_up				= document.querySelector(".pop-up"),
		cart_icon			= document.querySelectorAll(".cart-icon"),
		delete_icon			= document.querySelectorAll(".delete-icon");

	logout.addEventListener('click', function() {
		console.log('Hi');
	});
	change_password.addEventListener('click', function (){
		console.log('Нажата кнопка смены пароля');
	});

	pop_up.addEventListener('click', function() {
		modalWindowSign.classList.add('active-sign');
		console.log('Нажата кнопка pop-up');
	});

	closeWindowSign.addEventListener('click', function(){
		modalWindowSign.classList.remove('active-sign');
	});

	cart_icon.forEach(function (item){
		item.addEventListener('click', function() {
			console.log(item);
			console.log('Нажата кнопка помещения в корзину');
		});
	});

	delete_icon.forEach(function (item){
		item.addEventListener('click', function() {
			let id = item.value;
			fetch(window.location.href + '/delete/' + id);
			console.log(window.location.href + '/delete/' + id);
			console.log('Нажата кнопка удаления');
		});
	});
}

