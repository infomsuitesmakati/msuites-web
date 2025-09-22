function carousel() {
    return {
        currentSlide: 0,
        slides: [
            {
                image: "/images/6233371927897033518.jpg",
                title: "Welcome to MSUITES Hotel",
                text: "Your comfort, our luxury. Experience the perfect stay in the heart of the city."
            },
            {
                image: "/images/Lobby.jpg",
                title: "Welcome to MSUITES Hotel",
                text: "Your comfort, our luxury. Experience the perfect stay in the heart of the city."
            },
            {
                image: "/images/6233371927897033525.jpg",
                title: "Welcome to MSUITES Hotel",
                text: "Your comfort, our luxury. Experience the perfect stay in the heart of the city."
            }
        ],

        startAutoSlide() {
            setInterval(() => {
                this.nextSlide();
            }, 5000);
        },

        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        },

        prevSlide() {
            this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
        },

        goToSlide(index) {
            this.currentSlide = index;
        }
    };
}
