export default class extends HTMLElement {
    #openMenuBtn;
    #closeMenuBtn;
    #menuPanel;
    #body;

    connectedCallback() {
        this.#openMenuBtn = this.querySelector('#open-menu-btn');
        this.#closeMenuBtn = this.querySelector('#close-menu-btn');
        this.#menuPanel = this.querySelector('#menu-panel');
        this.#body = document.querySelector('body');

        this.#openMenuBtn.addEventListener('click', this.#toggleMenu.bind(this));
        this.#closeMenuBtn.addEventListener('click', this.#toggleMenu.bind(this));
    }

    #toggleMenu() {
        if(this.#menuPanel.classList.contains('hidden')) {
            this.#menuPanel.classList.remove('hidden');
            this.#body.classList.add('overflow-hidden');
        } else {
            this.#menuPanel.classList.add('hidden');
            this.#body.classList.remove('overflow-hidden');
        }
    }
}