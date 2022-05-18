require('./bootstrap');

const button = document.getElementById('navbar-button');
const reply_toggler_buttons = document.querySelectorAll('.reply_toggler_button');
const postCommentButtons = document.querySelectorAll('.post_comment_button');
const alert = document.querySelector('.alert');

button.addEventListener('click', () => {
  document.querySelector('#mobile-menu').classList.toggle('hidden');
});

if (alert)
  alert.querySelector('.cross').addEventListener('click', (e) => {
    alert.classList.add('hidden');
  });

// toggle post comment form
if (postCommentButtons) {
  postCommentButtons.forEach(button => {
    button.addEventListener('click', (e) => {
      e.preventDefault();
      button.parentElement.nextElementSibling.classList.toggle('hidden');
    });
  });
}

// toggle reply form 
if (reply_toggler_buttons) {
  reply_toggler_buttons.forEach(button => {
    button.addEventListener('click', (e) => {
      e.preventDefault();
      button.nextElementSibling.classList.toggle('hidden');
    });
  });
}


$('#example').breakingNews();