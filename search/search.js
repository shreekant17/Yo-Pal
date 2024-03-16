/*const followButton5 = document.querySelectorAll('.search_follow_button');

followButton5.forEach(item => {
    item.addEventListener('click', () => {
        if (item.classList.contains('followActive')) {
            item.classList.remove('followActive');
            item.value = "Follow";
        }
        else {
            item.classList.add('followActive');
            item.value = "Remove";
        }
    });
});*/

const container = document.querySelector('.follow');

container.addEventListener('click', (event) => {
    if (event.target.classList.contains('search_follow_button')) {
        const button = event.target;

        if (button.classList.contains('followActive')) {
            button.classList.remove('followActive');
            button.value = "Follow";
        } else {
            button.classList.add('followActive');
            button.value = "Remove";
        }
    }
});




