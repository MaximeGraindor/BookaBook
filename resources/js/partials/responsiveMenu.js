const responsiveMenu = {
    menuImgEl : document.querySelector('.header-responsiveMenu'),
    menuElt : document.querySelector('.header-nav'),

    closeMenu : document.querySelector('.responsiveMenu-close'),

    init(){
        this.showResponsiveMenu()
        this.closeResponsiveMenu()
    },

    showResponsiveMenu(){
        if (this.menuImgEl) {
            this.menuImgEl.addEventListener('click', () => {
                this.menuElt.classList.toggle('menuResponsive-on')
            })
        }

    },

    closeResponsiveMenu(){
        if (this.closeMenu) {
            this.closeMenu.addEventListener('click', () => {
                this.menuElt.classList.remove('menuResponsive-on')
            })
        }

    }
}

export default responsiveMenu
