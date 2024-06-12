document.addEventListener("DOMContentLoaded", () => {
    const faqItems = document.querySelectorAll(".faq__item");

    faqItems.forEach((item) => {
        const button = item.querySelector(".faq__question-button");
        button.addEventListener("click", () => {
            const wasActive = item.classList.contains("faq__item--active");

            faqItems.forEach((i) => i.classList.remove("faq__item--active"));

            if (!wasActive) {
                item.classList.add("faq__item--active");
            }
        });
    });
});
