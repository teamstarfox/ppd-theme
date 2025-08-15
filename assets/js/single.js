// TOC

(function () {
    const tocWrapper = document.querySelector("#table-of-contents");
    const tocHeader = document.querySelector("#table-of-contents .toc-header");
    const tocBody = document.querySelector("#table-of-contents .toc-body");
    const tableOfContents = document.getElementById("table-of-contents-list");
    let output_html = '';
    let h2 = document.querySelectorAll('#post-content h2');
    if (h2.length) { 
        for(let i=0; i<h2.length; i++){
            h2[i].setAttribute('id','toc-'+i);
            
            output_html += '<li><a href="#toc-'+i+'">'+h2[i].innerText+'</a></li>';
            var number = +i +1;
        }
        tableOfContents.insertAdjacentHTML('beforeend', output_html);
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            var ID = this.getAttribute('href').replace('#', '');

            var element = document.getElementById(ID);
            var headerOffset = 100;
            var elementPosition = element.getBoundingClientRect().top;
            var offsetPosition = elementPosition + window.pageYOffset - headerOffset;
            
             window.scrollTo({
                 top: offsetPosition,
                 behavior: "smooth"
            });
        });
    });

    tocHeader.addEventListener("click", function(){
        tocWrapper.classList.toggle('open');
        tocBody.classList.toggle('toc-open');

        if(tocBody.classList.contains('toc-open')) {
            tocBody.style.maxHeight = tocBody.scrollHeight + "px";
        } else {
            tocBody.style.maxHeight = null;
        }
    });

    const tocLinks = document.querySelectorAll('#table-of-contents-list a');

    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -60% 0px',
        threshold: 0
    };

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');

                // Remove .active from all <li>
                document.querySelectorAll('#table-of-contents-list li').forEach(li => {
                    li.classList.remove('active');
                });

                // Add .active to the <li> whose <a href="#id"> matches
                document.querySelectorAll(`#table-of-contents-list a[href="#${id}"]`).forEach(link => {
                    if (link.parentElement.tagName === 'LI') {
                        link.parentElement.classList.add('active');
                    }
                });
            }
        });
    }, observerOptions);

    // Observe all h2s
    h2.forEach(heading => observer.observe(heading));

})();



// Social Share 

document.addEventListener('DOMContentLoaded', function () {
    const copyButtons = document.querySelectorAll('.copy-link');

    copyButtons.forEach(button => {
        button.addEventListener('click', function () {
            const url = this.getAttribute('data-url');
            navigator.clipboard.writeText(url)
                // .then(() => {
                //     alert('Link copied to clipboard!');
                // })
                .catch(err => {
                    console.error('Copy failed', err);
                });
        });
    });
});