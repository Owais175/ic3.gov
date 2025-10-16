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
                        href="about.php">About Us</a>
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
                of terrorism, should be reported at <a href="#">https://cbi.gov.in/</a></p>
            <button id="fileComplaint" class="usa-button usa-button--big" type="button" data-open-modal href="#fileTerms"
                aria-controls="fileTerms">
                <svg width="25" height="25" fill="currentColor" viewBox="0 0 16 16" role="img" aria-hidden="true">
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
                        <img src="{{asset('asset/image/hygiene-post-1.jpg')}}" class="img-fluid" alt="">
                    </div>
                </li>
                <li class="text-center tablet:grid-col-4">
                    <div class="post-hygiene">
                        <img src="{{asset('asset/image/hygiene-post-2.jpg')}}" class="img-fluid" alt="">
                    </div>
                </li>
                <li class="text-center tablet:grid-col-4">
                    <div class="post-hygiene">
                        <img src="{{asset("asset/image/hygiene-post-3.jpg")}}" class="img-fluid" alt="">
                    </div>
                </li>
                <li class="text-center tablet:grid-col-4">
                    <div class="post-hygiene">
                        <img src="{{asset('asset/image/hygiene-post-4.jpg')}}" class="img-fluid" alt="">
                    </div>
                </li>
                <li class="text-center tablet:grid-col-4">
                    <div class="post-hygiene">
                        <img src="{{asset('asset/image/hygiene-post-5.jpg')}}" class="img-fluid" alt="">
                    </div>
                </li>
                <li class="text-center tablet:grid-col-4">
                    <div class="post-hygiene">
                        <img src="{{asset('asset/image/hygiene-post-6.jpg')}}" class="img-fluid" alt="">
                    </div>
                </li>
            </ul>
        </section>

        <section class="what-happened">
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
        </section>

        <section class="body-section">
            <h2>
                Protecting Our Digitally-connected World is a Top Priority and Focus of the FBI
            </h2>
            <div class="grid-row grid-gap">
                <div class="grid-col-fill">
                    <h3>
                        We Need You
                    </h3>
                    <p>Between staying connected with family and friends, shopping and banking online, and working remotely,
                        we all depend on security in our interconnected digital world. Criminals from every corner of the
                        globe attack our digital systems on a near constant basis. They strike targets large and small
                        &mdash; from corporate networks to personal smart phones. No one &mdash; and no device &mdash; is
                        immune from the threat. The only way forward is together. In cyber security, where a single
                        compromise can impact millions of people, there can be no weak links. Every organization and every
                        individual needs to take smart, reasonable steps to protect their own devices and systems and to
                        learn how to spot and avoid scams.</p>
                </div>
                <div class="desktop:grid-col-6 tablet:display-flex flex-align-center">
                    <div>
                        <figure>
                            <picture>
                                <source srcset="image/losses.webp" type="image/webp">
                                <img src="image/losses.jpg"
                                    alt="Column chart showing complaint-reported losses over a five-year period: $4.2 billion in 2020, $6.9 billion in 2021, $10.3 billion in 2022, $12.5 billion in 2023, and $16.6 billion in 2024">
                            </picture>
                            <figcaption>Chart includes loss data for the years 2020 to 2024. Over this time period, over $50
                                billion dollars were reported lost.</figcaption>
                        </figure>
                        <div class="text-center text-bold">For more information, please read our most recent Annual Report:
                        </div>
                        <div class="display-flex flex-align-center flex-justify-space-around margin-top-05em">
                            <div>
                                <a type="application/pdf" href="image/2024_IC3Report.pdf">
                                    <button class="usa-button margin-left-2px margin-right-2px" type="button">Annual
                                        Report</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3>
                The Information You Submit to IC3 Makes All the Difference
            </h3>
            <div>
                <p>Combined with other data, it allows the FBI to investigate reported crimes, track trends and threats,
                    and, in some cases, even freeze stolen funds. Just as importantly, IC3 shares reports of crime
                    throughout its vast network of FBI field offices and law enforcement partners, strengthening our
                    nation’s collective response both locally and nationally.</p>
                <p>Due to the massive number of complaints, we receive each year, IC3 cannot respond directly to every
                    submission, but please know we take each report seriously. With your help, we can and will respond
                    faster, defend cyber networks better, and more effectively protect our nation.</p>
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
                                        href="article/Digest_202509151058014947317.pdf">Indian Cyber
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
                                        href="article/Digest_202509171125159116104.pdf">Indian
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
                                    <a class="usa-link" href="article/Digest_202509221256097069772.pdf">Indian Cyber
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
                                    <a class="usa-link" href="article/Digest_202509290932205290931.pdf">Indian Cyber
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
                                    <a class="usa-link" type="application/pdf"
                                        href="article/Digest_202510091813144851909.pdf">Indian Cyber
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
                                    <a class="usa-link" type="application/pdf"
                                        href="article/Digest_202510151714492495235.pdf">Indian Cyber
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
                                    <a class="usa-link" type="application/pdf" href="article/IJSRA-2024-1919.pdf">A
                                        comprehensive survey of cybercrimes in India over the last decade
                                    </a>
                                </h4>
                            </div>
                        </li>
                    </ul>
                </section>
            </div>
        </section>

        <section class="blog-section">
            <h2>
                Blog
            </h2>
            <div class="grid-row grid-gap">
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div>
                        <figure>
                            <picture>
                                <source srcset="image//Cyber-Crime-Complaint-blog1.jpg" type="image/webp">
                                <img src="image/Cyber-Crime-Complaint-blog1.jpg" alt="">
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
                                <source srcset="image/Cyber-Crime-Complaint-blog2.jpg" type="image/webp">
                                <img src="image/Cyber-Crime-Complaint-blog2.jpg" alt="">
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
                                <source srcset="image/Cyber-Crime-Complaint-blog3.jpg" type="image/webp">
                                <img src="image/Cyber-Crime-Complaint-blog3.jpg" alt="">
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
                                <a href="image/gallery-1.webp" data-fancybox="gallery" data-caption="Gallery Images 1">
                                    <source srcset="image/gallery-1.webp" type="image/webp">
                                    <img src="image/gallery-1.webp" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="image/gallery-2.jpg" data-fancybox="gallery" data-caption="Gallery Images 2">
                                    <source srcset="image/gallery-2.jpg" type="image/webp">
                                    <img src="image/gallery-2.jpg" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="image/gallery-3.jpg" data-fancybox="gallery" data-caption="Gallery Images 3">
                                    <source srcset="image/gallery-3.jpg" type="image/webp">
                                    <img src="image/gallery-3.jpg" alt="">
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
                                <a href="image/gallery-4.jpg" data-fancybox="gallery" data-caption="Gallery Images 4">
                                    <source srcset="image/gallery-4.jpg" type="image/webp">
                                    <img src="image/gallery-4.jpg" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="image/gallery-5.webp" data-fancybox="gallery" data-caption="Gallery Images 5">
                                    <source srcset="image/gallery-5.webp" type="image/webp">
                                    <img src="image/gallery-5.webp" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="image/gallery-6.png" data-fancybox="gallery" data-caption="Gallery Images 6">
                                    <source srcset="image/gallery-6.png" type="image/webp">
                                    <img src="image/gallery-6.png" alt="">
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
                                <a href="image/gallery-7.jpg" data-fancybox="gallery" data-caption="Gallery Images 7">
                                    <source srcset="image/gallery-7.jpg" type="image/webp">
                                    <img src="image/gallery-7.jpg" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="image/gallery-8.jpg" data-fancybox="gallery" data-caption="Gallery Images 8">
                                    <source srcset="image/gallery-8.jpg" type="image/webp">
                                    <img src="image/gallery-8.jpg" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
                <div class="blogs-home desktop:grid-col-4 tablet:display-flex flex-align-center">
                    <div class="gallery-main-grid">
                        <figure>
                            <picture>
                                <a href="image/gallery-9.jpg" data-fancybox="gallery" data-caption="Gallery Images 9">
                                    <source srcset="image/gallery-9.jpg" type="image/webp">
                                    <img src="image/gallery-9.jpg" alt="">
                                </a>
                            </picture>
                        </figure>
                    </div>
                </div>
            </div>
        </section>

    </main>


@endsection