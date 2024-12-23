function observer(params) {
    const cards = document.querySelectorAll(".cards");

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                entry.target.classList.toggle("show", entry.isIntersecting);
                if (entry.isIntersecting) {
                    observer.unobserve(entry.target);
                }
                // console.log(entry);
            });
        },
        {
            threshold: 0.7,
        }
    );

    cards.forEach((card) => {
        observer.observe(card);
    });
}

observer();
