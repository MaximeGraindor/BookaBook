const selectBox = {
    selectboxElt : document.querySelector('.selectbox'),
    checkboxesElt  : document.querySelector('.checkboxes '),

    init(){
        this.showCheckboxes()
    },

    showCheckboxes(){
        this.selectboxElt.addEventListener('click', () => {
            this.checkboxesElt.classList.toggle('checkboxesEl-on')
        })
    }
}

export default selectBox


