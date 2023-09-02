document.addEventListener('DOMContentLoaded', function () {
    const contentArray = [];
    const initialContent = [];
    const minimumLength = document.querySelector('.read-more-less').getAttribute('data-id');
    const readMore = '...<br/><span class="read-more"><span class="las la-plus-circle"></span>Read More</span>';
    const readLess = '<br/><span class="read-less"><span class="las la-minus-circle"></span>Read Less</span>';
  
    const readToggles = document.querySelectorAll('.read-toggle');
  
    readToggles.forEach(function (toggle) {
      const index = toggle.getAttribute('data-id');
      contentArray[index] = toggle.innerHTML;
      const initialContentLength = contentArray[index].length;
  
      if (initialContentLength > minimumLength) {
        initialContent[index] = contentArray[index].substr(0, minimumLength);
      } else {
        initialContent[index] = contentArray[index];
      }
  
      toggle.innerHTML = initialContent[index] + readMore;
    });
  
    document.addEventListener('click', function (event) {
      if (event.target.classList.contains('read-more')) {
        const clickedElement = event.target;
        clickedElement.style.display = 'none';
  
        const clickedIndex = clickedElement.closest('.read-toggle').getAttribute('data-id');
        const toggleContent = contentArray[clickedIndex] + readLess;
        clickedElement.closest('.read-toggle').innerHTML = toggleContent;
      } else if (event.target.classList.contains('read-less')) {
        const clickedElement = event.target;
        clickedElement.style.display = 'none';
  
        const clickedIndex = clickedElement.closest('.read-toggle').getAttribute('data-id');
        const toggleContent = initialContent[clickedIndex] + readMore;
        clickedElement.closest('.read-toggle').innerHTML = toggleContent;
      }
    });
  });
  