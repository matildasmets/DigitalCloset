import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('form[id*="form"]').forEach(form => {

        form.addEventListener('submit', function (event) {
            const submitButton = form.querySelector('.submit-button');
            if (submitButton) {
                event.preventDefault();

                submitButton.disabled = true;
                submitButton.innerHTML = `
                    <span class="animate-spin inline-block w-4 h-4 border-[3px] border-current border-t-transparent rounded-full" role="status" aria-label="loading"></span>
                `;

                setTimeout(() => {
                    form.submit();
                }, 50);
            }
        });
    });
});
