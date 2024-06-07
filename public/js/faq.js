document.addEventListener('DOMContentLoaded', () => {
    const faqItems = document.querySelectorAll('.faq__item');

    faqItems.forEach(item => {
        const button = item.querySelector('.faq__question-button');
        button.addEventListener('click', () => {
            const wasActive = item.classList.contains('faq__item--active');

            // Close all open answers
            faqItems.forEach(i => i.classList.remove('faq__item--active'));

            // Toggle the current item if it wasn't already active
            if (!wasActive) {
                item.classList.add('faq__item--active');
            }
        });
    });
});