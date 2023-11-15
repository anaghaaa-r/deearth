document.addEventListener('DOMContentLoaded', function () {
  const readMore = '...<br/><span class="read-more"><span class="las la-plus-circle"></span>Read More</span>';
  const readLess = '<br/><span class="read-less"><span class="las la-minus-circle"></span>Read Less</span';

  const readToggles = document.querySelectorAll('.read-toggle');

  readToggles.forEach(function (toggle) {
    const content = toggle.innerHTML;
    const minimumLength = toggle.closest('.read-more-less').getAttribute('data-id');
    const initialContent = content.substr(0, minimumLength);

    if (content.length > minimumLength) {
      toggle.innerHTML = initialContent + readMore;

      toggle.addEventListener('click', function (event) {
        if (event.target.classList.contains('read-more')) {
          toggle.innerHTML = content + readLess;
        } else if (event.target.classList.contains('read-less')) {
          toggle.innerHTML = initialContent + readMore;
        }
      });
    } else {
      toggle.innerHTML = content;
    }
  });
});
