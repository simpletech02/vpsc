<x-guest-layout>

    @push('styles')
        <link rel="stylesheet" href="{{asset('css/faq.css')}}" />
    @endpush

    @push('scripts')
        <script src="{{asset('js/faq.js')}}"></script>
    @endpush
    <!-- Start FAQ -->
    <div class="faq">
        <div class="container">
            <h1 class="section-heading">Frequently Asked Questions</h1>
            <div class="row search justify-content-center">
                <div class="col-12 col-md-9">
                    <input
                        type="text"
                        class="form-control"
                        id="inputSearch"
                        placeholder="Search"
                    />
                    <a href="#" id="buttonSearch">
                        <img src="img/search.svg" alt="searchIcon" />
                    </a>
                </div>
            </div>
            <div class="row questions justify-content-center">
                <div class="col-12 col-md-9">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne"
                                    aria-expanded="true"
                                    aria-controls="collapseOne"
                                >
                                    Tincidunt purus sed velit?
                                </button>
                            </h2>
                            <div
                                id="collapseOne"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample"
                            >
                                <div class="accordion-body">
                                    <p>
                                        Odio dictumst sagittis adipiscing et diam sit amet
                                        parturient. Facilisi dignissim sit viverra sodales lacus,
                                        vel purus sapien gravida. Egestas quam at sed mauris,
                                        ultrices. Eu sagittis, a facilisi velit porttitor nascetur
                                        morbi cursus. Nunc pharetra, elit parturient dui at.
                                    </p>
                                    <p>
                                        Nunc cursus justo mi risus pellentesque sed turpis in. Nec
                                        facilisis arcu odio cursus senectus vestibulum rutrum orci
                                        mauris. Ultrices id tellus a turpis sodales nec in
                                        blandit. Odio convallis dictum dictum egestas. Nullam
                                        purus ultrices eget auctor vulputate. Egestas eget
                                        accumsan malesuada aliquam.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo"
                                    aria-expanded="true"
                                    aria-controls="collapseTwo"
                                >
                                    Condimentum cursus?
                                </button>
                            </h2>
                            <div
                                id="collapseTwo"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample"
                            >
                                <div class="accordion-body">
                                    <p>
                                        Odio dictumst sagittis adipiscing et diam sit amet
                                        parturient. Facilisi dignissim sit viverra sodales lacus,
                                        vel purus sapien gravida. Egestas quam at sed mauris,
                                        ultrices. Eu sagittis, a facilisi velit porttitor nascetur
                                        morbi cursus. Nunc pharetra, elit parturient dui at.
                                    </p>
                                    <p>
                                        Nunc cursus justo mi risus pellentesque sed turpis in. Nec
                                        facilisis arcu odio cursus senectus vestibulum rutrum orci
                                        mauris. Ultrices id tellus a turpis sodales nec in
                                        blandit. Odio convallis dictum dictum egestas. Nullam
                                        purus ultrices eget auctor vulputate. Egestas eget
                                        accumsan malesuada aliquam.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree"
                                    aria-expanded="true"
                                    aria-controls="collapseThree"
                                >
                                    Gravida nibh amet?
                                </button>
                            </h2>
                            <div
                                id="collapseThree"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample"
                            >
                                <div class="accordion-body">
                                    <p>
                                        Odio dictumst sagittis adipiscing et diam sit amet
                                        parturient. Facilisi dignissim sit viverra sodales lacus,
                                        vel purus sapien gravida. Egestas quam at sed mauris,
                                        ultrices. Eu sagittis, a facilisi velit porttitor nascetur
                                        morbi cursus. Nunc pharetra, elit parturient dui at.
                                    </p>
                                    <p>
                                        Nunc cursus justo mi risus pellentesque sed turpis in. Nec
                                        facilisis arcu odio cursus senectus vestibulum rutrum orci
                                        mauris. Ultrices id tellus a turpis sodales nec in
                                        blandit. Odio convallis dictum dictum egestas. Nullam
                                        purus ultrices eget auctor vulputate. Egestas eget
                                        accumsan malesuada aliquam.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour"
                                    aria-expanded="true"
                                    aria-controls="collapseFour"
                                >
                                    Urna vitae tincid?
                                </button>
                            </h2>
                            <div
                                id="collapseFour"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample"
                            >
                                <div class="accordion-body">
                                    <p>
                                        Odio dictumst sagittis adipiscing et diam sit amet
                                        parturient. Facilisi dignissim sit viverra sodales lacus,
                                        vel purus sapien gravida. Egestas quam at sed mauris,
                                        ultrices. Eu sagittis, a facilisi velit porttitor nascetur
                                        morbi cursus. Nunc pharetra, elit parturient dui at.
                                    </p>
                                    <p>
                                        Nunc cursus justo mi risus pellentesque sed turpis in. Nec
                                        facilisis arcu odio cursus senectus vestibulum rutrum orci
                                        mauris. Ultrices id tellus a turpis sodales nec in
                                        blandit. Odio convallis dictum dictum egestas. Nullam
                                        purus ultrices eget auctor vulputate. Egestas eget
                                        accumsan malesuada aliquam. Cola
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive"
                                    aria-expanded="true"
                                    aria-controls="collapsFive"
                                >
                                    Curabitur eget ullamcorper?
                                </button>
                            </h2>
                            <div
                                id="collapseFive"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample"
                            >
                                <div class="accordion-body">
                                    <p>
                                        Odio dictumst sagittis adipiscing et diam sit amet
                                        parturient. Facilisi dignissim sit viverra sodales lacus,
                                        vel purus sapien gravida. Egestas quam at sed mauris,
                                        ultrices. Eu sagittis, a facilisi velit porttitor nascetur
                                        morbi cursus. Nunc pharetra, elit Fanta parturient dui at.
                                    </p>
                                    <p>
                                        Nunc cursus justo mi risus pellentesque sed turpis in. Nec
                                        facilisis arcu odio cursus senectus vestibulum rutrum orci
                                        mauris. Ultrices id tellus a turpis sodales nec in
                                        blandit. Odio convallis dictum dictum egestas. Nullam
                                        purus ultrices eget auctor vulputate. Egestas eget
                                        accumsan malesuada aliquam.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End FAQ -->
</x-guest-layout>
