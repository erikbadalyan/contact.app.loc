let selectBox = document.querySelector('#filter_company_id');
let deleteContactBtn = document.querySelectorAll('.btn-delete');
if (selectBox) {
    selectBox.addEventListener('change', function () {
        let companyId = this.value || this.options[this.selectedIndex].value;
        window.location.href = window.location.href.split('?')[0] + '?company_id=' + companyId;
    });
}

deleteContactBtn.forEach(function (button){
    button.addEventListener('click', function (event){
        event.preventDefault();
        if (confirm('Are you sure?')) {
            let action = this.getAttribute('href');
            let form = document.querySelector('#form-delete')
            form.setAttribute('action', action);
            form.submit();
        }
    });
});

