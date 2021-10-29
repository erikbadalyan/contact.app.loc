let selectBox = document.querySelector('#filter_company_id');
selectBox.addEventListener('change', function () {
    let companyId = this.value || this.options[this.selectedIndex].value;
    window.location.href = window.location.href.split('?')[0] + '?company_id=' + companyId;
});
