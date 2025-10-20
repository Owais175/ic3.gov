@extends('front.app')


@section('content')
    <main id="main-content" class="usa-prose grid-container">

        <section class="body-section margin-top-1">
            <h1>Welcome to the Internet Crime Complaint Center</h1>
            <div>
                <p>
                    The Internet Crime Complaint Center is the central hub for reporting cyber-enabled crime. It is
                    run by the CBI, premier investigative agency in the country today, with a dual responsibility to
                    investigate grievous cases and provide leadership and direction in fighting corruption to the Police
                    force across the country
                </p>
                <p>
                    For more information about the Internet Crime Complaint Center and its mission, please see the <a
                        href="{{ route('about') }}">About Us</a>
                    page.
                </p>
            </div>
        </section>
        <section class="body-section">
            <h2>
                File a Complaint with Us
            </h2>
            <div class="usa-alert usa-alert--error usa-alert--slim" role="alert">
                <div class="usa-alert__body">
                    <p class="usa-alert__text text-bold">
                        If you or someone else is in immediate danger, please call 911 or your local police.
                    </p>
                </div>
            </div>
            <p>The Internet Crime Complaint Centre focuses on collecting cyber-enabled crime. Crimes against
                women/ children should be filed with <span>Cyber Crime Portal</span>. Other types of crimes, such as threats
                of terrorism, should be reported at <a href="{{ route('index') }}">https://cbi.gov.in/</a></p>
            <button id="fileComplaint" class="usa-button usa-button--big" type="button" data-open-modal href="#fileTerms"
                aria-controls="fileTerms">
                <svg width="25" height="25" fill="currentColor" viewBox="0 0 16 16" role="img"
                    aria-hidden="true">
                    <path
                        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                    <path
                        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                </svg>
                <div>File A Complaint</div>
            </button>
        </section>
        <section id="works" class="body-section">
            <h2>
                HCyber Hygiene Post
            </h2>
            <ul class="display-flex flex-justify usa-list--unstyled grid-row grid-gap">
                <li class="text-center tablet:grid-col-4">
                    <div class="post-hygiene">
                        <img src="{{ asset('asset/image/hygiene-post-1.jpg') }}" class="img-fluid" alt="">
                    </div>
                </li>
                <li class="text-center tablet:grid-col-4">
                    <div class="post-hygiene">
                        <img src="{{ asset('asset/image/hygiene-post-2.jpg') }}" class="img-fluid" alt="">
                    </div>
                </li>
                <li class="text-center tablet:grid-col-4">
                    <div class="post-hygiene">
                        <img src="{{ asset('asset/image/hygiene-post-3.jpg') }}" class="img-fluid" alt="">
                    </div>
                </li>
                <li class="text-center tablet:grid-col-4">
                    <div class="post-hygiene">
                        <img src="{{ asset('asset/image/hygiene-post-4.jpg') }}" class="img-fluid" alt="">
                    </div>
                </li>
                <li class="text-center tablet:grid-col-4">
                    <div class="post-hygiene">
                        <img src="{{ asset('asset/image/hygiene-post-5.jpg') }}" class="img-fluid" alt="">
                    </div>
                </li>
                <li class="text-center tablet:grid-col-4">
                    <div class="post-hygiene">
                        <img src="{{ asset('asset/image/hygiene-post-6.jpg') }}" class="img-fluid" alt="">
                    </div>
                </li>
            </ul>
        </section>

        {{-- <section class="what-happened">
            <div class="grid-row grid-gap">
                <div class="text-center para-fill-grid">
                    <h3>
                        Tell us what happened.
                    </h3>
                    <p>File a report to share information with the CBI. Internet Crime Centre is the
                        main intake form for a variety of complaints — everything from cyberenabled frauds and scams to
                        cybercrime — so file a report even if you are
                        unsure of whether your complaint qualifies.
                    </p>
                </div>
                <div class="text-center para-fill-grid">
                    <h3>
                        Your contribution and our mission.
                    </h3>
                    <p>Your report helps us fulfill our mission of protecting the American people.
                        While we cannot guarantee a response to every complaint, your report is
                        still valuable. It helps us understand the broader threat landscape.
                        Furthermore, in those cases where we are able to take action, we will work
                        to provide justice
                    </p>
                </div>
                <div class="text-center para-fill-grid">
                    <h3>
                        Protect yourself and others.
                    </h3>
                    <p>If you have suffered from a cyber-enabled crime, please know that you are
                        not alone. Use the resources on this site to learn more about how to
                        protect yourself and others from cybercrime
                    </p>
                </div>
            </div>
        </section> --}}

        <section id="works" class="body-section">
            <h2>
                How You Can Help
            </h2>
            <ul class="display-flex flex-justify usa-list--unstyled grid-row grid-gap">
                <li class="text-center tablet:grid-col-4">
                    <div>
                        <svg class="hp-icon" viewBox="0 0 126.719 115.379" aria-hidden="true">
                            <defs>
                                <filter id="comment-lines" x="0" y="0" filterUnits="userSpaceOnUse">
                                    <feOffset input="SourceAlpha" />
                                    <feGaussianBlur stdDeviation="6" result="blur" />
                                    <feFlood flood-opacity="0.149" />
                                    <feComposite operator="in" in2="blur" />
                                    <feComposite in="SourceGraphic" />
                                </filter>
                            </defs>
                            <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#comment-lines)">
                                <path id="comment-lines-2" data-name="comment-lines"
                                    d="M90.719,68.854c0,20.359-20.305,36.854-45.359,36.854a54.5,54.5,0,0,1-15.876-2.321L2.835,111.379,10.082,92.03C3.774,85.7,0,77.643,0,68.854,0,48.5,20.305,32,45.359,32S90.719,48.5,90.719,68.854ZM26.932,57.515H22.68v8.5H68.039v-8.5H26.932Zm0,17.01H22.68v8.5h28.35v-8.5h-24.1Z"
                                    transform="translate(18 -14)" />
                            </g>
                        </svg>
                        <h3 class="tablet:font-sans-3xs desktop:font-sans-xs">Tell us what happened.</h3>
                    </div>
                    <p class="font-body-sm">File a report to share information with the FBI. IC3 is the main intake form for
                        a variety of complaints &mdash; everything from cyber-enabled frauds and scams to cybercrime &mdash;
                        so file a report even if you are unsure of whether your complaint qualifies.</p>
                </li>
                <li class="text-center tablet:grid-col-4">
                    <div>
                        <svg class="hp-icon" viewBox="0 0 143 100.223" aria-hidden="true">
                            <defs>
                                <filter id="handshake-alt" x="0" y="0" filterUnits="userSpaceOnUse">
                                    <feOffset input="SourceAlpha" />
                                    <feGaussianBlur stdDeviation="6" result="blur" />
                                    <feFlood flood-opacity="0.161" />
                                    <feComposite operator="in" in2="blur" />
                                    <feComposite in="SourceGraphic" />
                                </filter>
                            </defs>
                            <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#handshake-alt)">
                                <path id="handshake-alt-2" data-name="handshake-alt"
                                    d="M80.9,109.926,55.941,89.663l-5.016,4.6c-6.788,6.2-14.512,1.99-17-.736a12.043,12.043,0,0,1,.736-17L48.334,64H34.324a5.34,5.34,0,0,0-3.778,1.572L21.4,74.7H2.675A2.683,2.683,0,0,0,0,77.375v32.083a2.683,2.683,0,0,0,2.675,2.675H24.46l15.13,13.693a10.7,10.7,0,0,0,15.047-1.555l.033-.033,2.993,2.591a6.213,6.213,0,0,0,8.744-.9l5.25-6.453.9.736a5.342,5.342,0,0,0,7.523-.786l1.588-1.956a5.36,5.36,0,0,0-.769-7.54ZM104.325,74.7H85.6l-9.128-9.128A5.34,5.34,0,0,0,72.693,64H58.332a5.348,5.348,0,0,0-3.611,1.4L38.286,80.451c-.017.017-.033.05-.05.067a6.636,6.636,0,0,0-.351,9.363,6.737,6.737,0,0,0,9.379.451c.017-.017.05-.017.067-.033l8.861-8.109,4.514-4.13a2.674,2.674,0,1,1,3.611,3.946l-4.364,4L84.3,105.763a10.593,10.593,0,0,1,3.712,6.336h16.318A2.683,2.683,0,0,0,107,109.425V77.358A2.669,2.669,0,0,0,104.325,74.7Z"
                                    transform="translate(18 -46)" />
                            </g>
                        </svg>
                        <h3 class="font-family-sans tablet:font-sans-3xs desktop:font-sans-xs">Your contribution and our
                            mission.</h3>
                    </div>
                    <p class="tablet:font-body-xs">Your report helps us fulfill our mission of protecting the American
                        people. While we cannot guarantee a response to every complaint, your report is still valuable. It
                        helps us understand the broader threat landscape. Furthermore, in those cases where we are able to
                        take action, we will work to provide justice.</p>
                </li>
                <li class="text-center tablet:grid-col-4">
                    <div>
                        <svg class="hp-icon" viewBox="0 0 124.738 127.454" aria-hidden="true">
                            <defs>
                                <filter id="Path_1873" x="45.869" y="0" filterUnits="userSpaceOnUse">
                                    <feOffset input="SourceAlpha" />
                                    <feGaussianBlur stdDeviation="6" result="blur" />
                                    <feFlood flood-opacity="0.161" />
                                    <feComposite operator="in" in2="blur" />
                                    <feComposite in="SourceGraphic" />
                                </filter>
                                <filter id="Path_1874" x="0" y="0" filterUnits="userSpaceOnUse">
                                    <feOffset input="SourceAlpha" />
                                    <feGaussianBlur stdDeviation="6" result="blur-2" />
                                    <feFlood flood-opacity="0.161" />
                                    <feComposite operator="in" in2="blur-2" />
                                    <feComposite in="SourceGraphic" />
                                </filter>
                            </defs>
                            <g id="shield-alt" transform="translate(2 18)">
                                <g transform="matrix(1, 0, 0, 1, -2, -18)" filter="url(#Path_1873)">
                                    <path id="Path_1873-2" data-name="Path 1873"
                                        d="M298.869,22.864c0,39.527-24.275,61.553-39.582,67.933a8.626,8.626,0,0,1-3.287.657V0a8.606,8.606,0,0,1,3.3.656l34.3,14.29a8.574,8.574,0,0,1,5.269,7.918Z"
                                        transform="translate(-192.13 18)" />
                                </g>
                                <g transform="matrix(1, 0, 0, 1, -2, -18)" filter="url(#Path_1874)">
                                    <path id="Path_1874-2" data-name="Path 1874"
                                        d="M58.869,0V91.454a8.606,8.606,0,0,1-3.3-.656C36.452,82.83,16,58.323,16,22.864a8.574,8.574,0,0,1,5.287-7.917L55.583.657A8.626,8.626,0,0,1,58.869,0Z"
                                        transform="translate(2 18)" />
                                </g>
                            </g>
                        </svg>

                        <h3 class="tablet:font-sans-3xs desktop:font-sans-xs">Protect yourself and others.</h3>
                    </div>
                    <p>If you have suffered from a cyber-enabled crime, please know that you are not alone. Use the
                        resources on this site to learn more about how to protect yourself and others from cybercrime.</p>
                </li>
            </ul>
        </section>

        <section class="body-section">
            <h2>
                Protecting Our Digitally-connected World is a Top Priority and
                Focus of the CBI
            </h2>
            <div class="grid-row grid-gap">
                <div class="grid-col-fill">
                    <h3>
                        We Need You
                    </h3>
                    <p>Between staying connected with family and friends, shopping and banking online,
                        and working remotely, we all depend on security in our interconnected digital world.
                        Criminals from every corner of the globe attack our digital systems on a near
                        constant basis. They strike targets large and small — from corporate networks to
                        personal smart phones. No one — and no device — is immune from the threat. The
                        only way forward is together. In cyber security, where a single compromise can
                        impact millions of people, there can be no weak links. Every organization and every
                        individual needs to take smart, reasonable steps to protect their own devices and
                        systems and to learn how to spot and avoid scams.</p>
                </div>
                <div class="desktop:grid-col-6 tablet:display-flex flex-align-center">
                    <div>
                        <figure>
                            <picture>
                                <source srcset="{{ asset('asset/image/losses.jpg') }}" type="image/webp">
                                <img src="{{ asset('asset/image/losses.jpg') }}"
                                    alt="Column chart showing complaint-reported losses over a five-year period: $4.2 billion in 2020, $6.9 billion in 2021, $10.3 billion in 2022, $12.5 billion in 2023, and $16.6 billion in 2024">
                            </picture>
                            <figcaption>Chart includes surge in cyber attacks for the year 2017 to 2021. Over
                                this time period, over 14 lakh cyber attacks were registered. </figcaption>
                        </figure>
                        <div class="text-center text-bold">For more information, please read our most latest Annual Report
                        </div>
                        <div class="display-flex flex-align-center flex-justify-space-around margin-top-05em">
                            <div>
                                <a type="application/pdf" href="{{ asset('asset/image/2024_IC3Report.pdf') }}">
                                    <button class="usa-button margin-left-2px margin-right-2px" type="button">Annual
                                        Report</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3>
                The Information You Submit Makes All the Difference
            </h3>
            <div>
                <p>Combined with other data, it allows the CBI to investigate reported
                    crimes, track trends and threats, and, in some cases, even freeze
                    stolen funds. Just as importantly, we shares reports of crime
                    throughout its vast network of CBI field offices and law enforcement
                    partners, strengthening our nation’s collective response both locally
                    and nationally. </p>
                <p>Due to the massive number of complaints, we receive each year, we
                    cannot respond directly to every submission, but please know we
                    take each report seriously. With your help, we can and will respond
                    faster, defend cyber networks better, and more effectively protect
                    our nation.</p>
            </div>
        </section>

        <section class="body-section">
            <h2>Articles</h2>
            <div id="recentAlerts">
                <section>
                    <ul class="usa-collection">
                        <li class="usa-collection__item">
                            <div class="usa-collection__calendar-date">
                                <time datetime="2025-09-19T10:00:00-04:00">
                                    <span class="usa-collection__calendar-date-month">Sep</span>
                                    <span class="usa-collection__calendar-date-day">15</span>
                                </time>
                            </div>
                            <div class="usa-collection__body">
                                <h4 class="usa-collection__heading">
                                    <a class="usa-link" target="_blank"
                                        href="{{ asset('asset/article/Digest_202509151058014947317.pdf') }}">Indian Cyber
                                        Crime
                                        Coordination Centre Ministry Of Home Affairs</a>
                                </h4>
                            </div>
                        </li>
                        <li class="usa-collection__item">
                            <div class="usa-collection__calendar-date">
                                <time datetime="2025-09-04T08:00:00-04:00">
                                    <span class="usa-collection__calendar-date-month">Sep</span>
                                    <span class="usa-collection__calendar-date-day">17</span>
                                </time>
                            </div>
                            <div class="usa-collection__body">
                                <h4 class="usa-collection__heading">
                                    <a class="usa-link" target="_blank"
                                        href="{{ asset('asset/article/Digest_202509171125159116104.pdf') }}">Indian
                                        Cyber
                                        Crime
                                        Coordination Centre Ministry Of Home Affairs</a>
                                </h4>
                            </div>
                        </li>
                        <li class="usa-collection__item">
                            <div class="usa-collection__calendar-date">
                                <time datetime="2025-08-20T09:00:00-04:00">
                                    <span class="usa-collection__calendar-date-month">Sep</span>
                                    <span class="usa-collection__calendar-date-day">22</span>
                                </time>
                            </div>
                            <div class="usa-collection__body">
                                <h4 class="usa-collection__heading">
                                    <a class="usa-link" target="_blank"
                                        href="{{ asset('asset/article/Digest_202509221256097069772.pdf') }}">Indian Cyber
                                        Crime
                                        Coordination Centre Ministry Of Home Affairs</a>
                                </h4>
                            </div>
                        </li>
                        <li class="usa-collection__item">
                            <div class="usa-collection__calendar-date">
                                <time datetime="2025-08-13T14:00:00-04:00">
                                    <span class="usa-collection__calendar-date-month">Sep</span>
                                    <span class="usa-collection__calendar-date-day">26</span>
                                </time>
                            </div>
                            <div class="usa-collection__body">
                                <h4 class="usa-collection__heading">
                                    <a class="usa-link" target="_blank"
                                        href="{{ asset('asset/article/Digest_202509290932205290931.pdf') }}">Indian Cyber
                                        Crime
                                        Coordination Centre Ministry Of Home Affairs</a>
                                </h4>
                            </div>
                        </li>
                    </ul>
                </section>



                <section class="tablet:margin-0 margin-top-2">
                    <ul class="usa-collection">
                        <li class="usa-collection__item">
                            <div class="usa-collection__calendar-date">
                                <time datetime="2025-09-29T06:00:00-04:00">
                                    <span class="usa-collection__calendar-date-month">Oct</span>
                                    <span class="usa-collection__calendar-date-day">8</span>
                                </time>
                            </div>
                            <div class="usa-collection__body">
                                <h4 class="usa-collection__heading">
                                    <a class="usa-link" type="application/pdf" target="_blank"
                                        href="{{ asset('asset/article/Digest_202510091813144851909.pdf') }}">Indian Cyber
                                        Crime
                                        Coordination Centre Ministry Of Home Affairs</a>
                                </h4>
                            </div>
                        </li>
                        <li class="usa-collection__item">
                            <div class="usa-collection__calendar-date">
                                <time datetime="2025-09-12T15:00:00-04:00">
                                    <span class="usa-collection__calendar-date-month">Oc</span>
                                    <span class="usa-collection__calendar-date-day">15</span>
                                </time>
                            </div>
                            <div class="usa-collection__body">
                                <h4 class="usa-collection__heading">
                                    <a class="usa-link" type="application/pdf" target="_blank"
                                        href="{{ asset('asset/article/Digest_202510151714492495235.pdf') }}">Indian Cyber
                                        Crime
                                        Coordination Centre Ministry Of Home Affairs</a>
                                </h4>
                            </div>
                        </li>
                        <li class="usa-collection__item">
                            <div class="usa-collection__calendar-date">
                                <time datetime="2025-08-27T10:30:00-04:00">
                                    <span class="usa-collection__calendar-date-month">Oct</span>
                                    <span class="usa-collection__calendar-date-day">12</span>
                                </time>
                            </div>
                            <div class="usa-collection__body">
                                <h4 class="usa-collection__heading">
                                    <a class="usa-link" type="application/pdf" target="_blank"
                                        href="{{ asset('asset/article/IJSRA-2024-1919.pdf') }}">A
                                        comprehensive survey of cybercrimes in India over the last decade
                                    </a>
                                </h4>
                            </div>
                        </li>
                    </ul>
                </section>
            </div>
        </section>

        {{-- <section class="blog-section">
            <h2>
                Blog
            </h2>
            <div class="grid-row grid-gap">
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div>
                        <figure>
                            <picture>
                                <source srcset="{{ asset('asset/image/Cyber-Crime-Complaint-blog1.jpg') }}"
                                    type="image/webp">
                                <img src="{{ asset('asset/image/Cyber-Crime-Complaint-blog1.jpg') }}" alt="">
                            </picture>
                            <h4>Lorem Lipsum</h4>
                        </figure>
                        <div class="text-center text-bold blog-detail">Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit. Aliquam
                            temporibus obcaecati neque numquam vitae perferendis?
                        </div>
                    </div>
                </div>
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div>
                        <figure>
                            <picture>
                                <source srcset="{{ asset('asset/image/Cyber-Crime-Complaint-blog2.jpg') }}"
                                    type="image/webp">
                                <img src="{{ asset('asset/image/Cyber-Crime-Complaint-blog2.jpg') }}" alt="">
                            </picture>
                            <h4>Lorem Lipsum</h4>
                        </figure>
                        <div class="text-center text-bold blog-detail">Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit. Aliquam
                            temporibus obcaecati neque numquam vitae perferendis?
                        </div>
                    </div>
                </div>
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div>
                        <figure>
                            <picture>
                                <source srcset="{{ asset('asset/image/Cyber-Crime-Complaint-blog3.jpg') }}"
                                    type="image/webp">
                                <img src="{{ asset('asset/image/Cyber-Crime-Complaint-blog3.jpg') }}" alt="">
                            </picture>
                            <h4>Lorem Lipsum</h4>
                        </figure>
                        <div class="text-center text-bold blog-detail">Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit. Aliquam
                            temporibus obcaecati neque numquam vitae perferendis?
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="blog-section gallery_sec">
            <h2>
                Gallery
            </h2>
            <div class="grid-row grid-gap">
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="{{ asset('asset/image/gallery-1.webp') }}" data-fancybox="gallery"
                                    data-caption="Gallery Images 1">
                                    <source srcset="image/gallery-1.webp" type="image/webp">
                                    <img src="{{ asset('asset/image/gallery-1.webp') }}" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="{{ asset('asset/image/gallery-2.jpg') }}" data-fancybox="gallery"
                                    data-caption="Gallery Images 2">
                                    <source srcset="image/gallery-2.jpg" type="image/webp">
                                    <img src="{{ asset('asset/image/gallery-2.jpg') }}" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="{{ asset('asset/image/gallery-3.jpg') }}" data-fancybox="gallery"
                                    data-caption="Gallery Images 3">
                                    <source srcset="image/gallery-3.jpg" type="image/webp">
                                    <img src="{{ asset('asset/image/gallery-3.jpg') }}" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="grid-row grid-gap">
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="{{ asset('asset/image/gallery-4.jpg') }}" data-fancybox="gallery"
                                    data-caption="Gallery Images 4">
                                    <source srcset="image/gallery-4.jpg" type="image/webp">
                                    <img src="{{ asset('asset/image/gallery-4.jpg') }}" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="{{ asset('asset/image/gallery-5.webp') }}" data-fancybox="gallery"
                                    data-caption="Gallery Images 5">
                                    <source srcset="image/gallery-5.webp" type="image/webp">
                                    <img src="{{ asset('asset/image/gallery-5.webp') }}" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="{{ asset('asset/image/gallery-6.png') }}" data-fancybox="gallery"
                                    data-caption="Gallery Images 6">
                                    <source srcset="image/gallery-6.png" type="image/webp">
                                    <img src="{{ asset('asset/image/gallery-6.png') }}" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="grid-row grid-gap">
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="{{ asset('asset/image/gallery-7.jpg') }}" data-fancybox="gallery"
                                    data-caption="Gallery Images 7">
                                    <source srcset="image/gallery-7.jpg" type="image/webp">
                                    <img src="{{ asset('asset/image/gallery-7.jpg') }}" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="{{ asset('asset/image/gallery-8.jpg') }}" data-fancybox="gallery"
                                    data-caption="Gallery Images 8">
                                    <source srcset="image/gallery-8.jpg" type="image/webp">
                                    <img src="{{ asset('asset/image/gallery-8.jpg') }}" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="{{ asset('asset/image/gallery-9.jpg') }}" data-fancybox="gallery"
                                    data-caption="Gallery Images 9">
                                    <source srcset="image/gallery-9.jpg" type="image/webp">
                                    <img src="{{ asset('asset/image/gallery-9.jpg') }}" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
            </div>
        </section> --}}

    </main>
@endsection
