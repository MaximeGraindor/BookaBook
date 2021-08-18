const responsiveMenu = {
    menuImgEl : document.querySelector('.header-responsiveMenu'),
    menuElt : document.querySelector('.header-nav'),

    init(){
        this.showResponsiveMenu()
    },

    showResponsiveMenu(){
        if (this.menuImgEl) {
            this.menuImgEl.addEventListener('click', () => {
                this.menuElt.classList.toggle('menuResponsive-on')
            })
        }

    }
}

export default responsiveMenu
