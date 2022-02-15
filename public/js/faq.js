$(document).ready(function() {
    // collect all faq data for searching
    let questions = [];
    let $inputSearch = $('#inputSearch');
    $('.faq .questions').find('.accordion-item').each(function(index, el) {
        let $el = $(el);
        let $body = $el.find('.accordion-collapse')[0];
        let $header = $el.find('.accordion-header')[0];
        questions.push({
            question: $header.innerText.toLowerCase(),
            answer: $body.innerText.toLowerCase(),
            collapseId: $body.id,
            collapse : new bootstrap.Collapse($body, {toggle: false})
        });
    });

    $('#buttonSearch').on('click', function(e) {
        e.preventDefault();

        // prepare terms for searching
        const terms = $inputSearch.val().toLowerCase().split(" ").filter(term => term.length > 0);

        // close all accordions
        questions.forEach(question => question.collapse.hide());

        if(terms.length > 0) {
            let scrollToEl = null;
            questions.forEach(function(question) {
                let found = false;
                terms.forEach(function(term) {
                    if (question.question.indexOf(term) !== -1 || question.answer.indexOf(term) !== -1) {
                        found = true;
                    }
                });
                if(found) {
                    console.log(question.collapse);
                    question.collapse.show();
                    if(scrollToEl == null) {
                        scrollToEl = document.getElementById(question.collapseId);
                    }
                }
            });
            if(scrollToEl !== null) {
                scrollToEl.scrollIntoView();
            }
        }
    });
})
