'use strict';

/* ===== Enable Bootstrap Popover (on element  ====== */
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

/* ==== Enable Bootstrap Alert ====== */
//var alertList = document.querySelectorAll('.alert')
//alertList.forEach(function (alert) {
//  new bootstrap.Alert(alert)
//});

const alertList = document.querySelectorAll('.alert')
const alerts = [...alertList].map(element => new bootstrap.Alert(element))


/* ===== Responsive Sidepanel ====== */
const sidePanelToggler = document.getElementById('sidepanel-toggler'); 
const sidePanel = document.getElementById('app-sidepanel');  
const sidePanelDrop = document.getElementById('sidepanel-drop'); 
const sidePanelClose = document.getElementById('sidepanel-close'); 

window.addEventListener('load', function(){
	responsiveSidePanel(); 
});

window.addEventListener('resize', function(){
	responsiveSidePanel(); 
});

// Ocultar loader al cargar la página
window.addEventListener("load", function () {
	document.getElementById("loader").style.display = "none";
});

// Mostrar loader antes de que se cambie de página
window.addEventListener("beforeunload", function () {
	document.getElementById("loader").style.display = "flex";
});


function responsiveSidePanel() {
    let w = window.innerWidth;
	if(w >= 1200) {
	    // if larger 
	    //console.log('larger');
		sidePanel.classList.remove('sidepanel-hidden');
		sidePanel.classList.add('sidepanel-visible');
		
	} else {
	    // if smaller
	    //console.log('smaller');
	    sidePanel.classList.remove('sidepanel-visible');
		sidePanel.classList.add('sidepanel-hidden');
	}
};

sidePanelToggler.addEventListener('click', () => {
	if (sidePanel.classList.contains('sidepanel-visible')) {
		console.log('visible');
		sidePanel.classList.remove('sidepanel-visible');
		sidePanel.classList.add('sidepanel-hidden');
		
	} else {
		console.log('hidden');
		sidePanel.classList.remove('sidepanel-hidden');
		sidePanel.classList.add('sidepanel-visible');
	}
});



sidePanelClose.addEventListener('click', (e) => {
	e.preventDefault();
	sidePanelToggler.click();
});

sidePanelDrop.addEventListener('click', (e) => {
	sidePanelToggler.click();
});



/* ====== Mobile search ======= */
const searchMobileTrigger = document.querySelector('.search-mobile-trigger');
const searchBox = document.querySelector('.app-search-box');

searchMobileTrigger.addEventListener('click', () => {

	searchBox.classList.toggle('is-visible');
	
	let searchMobileTriggerIcon = document.querySelector('.search-mobile-trigger-icon');
	
	if(searchMobileTriggerIcon.classList.contains('fa-magnifying-glass')) {
		searchMobileTriggerIcon.classList.remove('fa-magnifying-glass');
		searchMobileTriggerIcon.classList.add('fa-xmark');
	} else {
		searchMobileTriggerIcon.classList.remove('fa-xmark');
		searchMobileTriggerIcon.classList.add('fa-magnifying-glass');
	}
});

// TODO: CODIGO PARA MANEJAR EVENTOS DEL MENU Y EVITAR RECARGAS DE LA PAGINA

document.addEventListener('DOMContentLoaded', function () {
	const menuLinks = document.querySelectorAll('#app-nav-main .nav-link');

	// Manejar click en los enlaces
	function handleMenuClick(event) {
		const currentUrl = window.location.pathname.replace(/\/$/, "");
		const targetUrl = new URL(this.href).pathname.replace(/\/$/, "");

		// Si ya estás en la misma URL, evita recargar
		if (currentUrl === targetUrl) {
			event.preventDefault();
			return;
		}

			// Quitar "active" de todos
			menuLinks.forEach(link => link.classList.remove('active'));

			// Agregar "active" al actual
			this.classList.add('active');

			// Si pertenece a un submenu, abrir y activar su padre
			if (this.closest('.submenu')) {
				const parentItem = this.closest('.has-submenu');
				if (parentItem) {
					const parentLink = parentItem.querySelector('.nav-link.submenu-toggle');
					if (parentLink) parentLink.classList.add('active');
				}
			}
		}

	// Agregar listener a todos los links
	menuLinks.forEach(link => {
		link.addEventListener('click', handleMenuClick);
	});

	// Activar el enlace correcto al cargar según la URL actual
	function setactiveMenuBasedOnUrl() {
    const currentUrl = window.location.pathname.replace(/\/$/, "");

    menuLinks.forEach(link => {
        const href = link.getAttribute('href') || '';

        // 🚫 Ignorar si el href está vacío, es "#" o contiene "void(0)"
        if (
            href.trim() === '' ||
            href === '#' ||
            href.toLowerCase().includes('void(0)')
        ) {
            return;
        }

        const linkUrl = new URL(link.href).pathname.replace(/\/$/, "");

        if (linkUrl === currentUrl) {
            link.classList.add('active');

            // Si es submenu, activar también el padre
            if (link.closest('.submenu')) {
                const parentItem = link.closest('.has-submenu');
                if (parentItem) {
                    const parentLink = parentItem.querySelector('.nav-link.submenu-toggle');
                    if (parentLink) parentLink.classList.add('active');
                }
            }
        }
    });
}


	// Ejecutar al cargar
	setactiveMenuBasedOnUrl();
});