<?php
define('BASE_URL', '/ic3.gov/');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>Home Page - Internet Crime Complaint Center (IC3)</title>
    <script nonce="dvm0ixsemwv20rrd">
        if (window.trustedTypes) {
            trustedTypes.createPolicy('default', {
                createHtml: s => {
                    console.error(`TrustedHTML Violation: ${s}`);
                    return null;
                },
                createScript: s => {
                    console.error(`TrustedScript Violation: ${s}`);
                    return null;
                },
                createScriptURL: s => {
                    const prefix = ['https://www.gstatic.com/recaptcha/releases/', 'https://www.googletagmanager.com/gtag/js'];
                    let u = undefined;
                    try {
                        u = new URL(s);
                        u = `${u.protocol}//${u.host}${u.pathname}`;
                    } catch {}
                    if ((u && prefix.some(x => u.startsWith(x))) || 'https://www.google-analytics.com/analytics.js' === s) {
                        return s;
                    } else {
                        console.error(`TrustedScriptURL Violation: ${s}`);
                        return null;
                    }
                }
            });
        }
    </script>
    <script src="js/uswds-init.min.js" nonce="dvm0ixsemwv20rrd"></script>
    <script defer src="js/uswds.min.js" nonce="dvm0ixsemwv20rrd"></script>
    <link rel="stylesheet" href="css/uswds.min.css">
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="css/form.css">


    <!-- We participate in the US government's analytics program. See the data at analytics.usa.gov. -->
    <script async src="https://dap.digitalgov.gov/Universal-Federated-Analytics-Min.js?agency=DOJ" id="_fed_an_ua_tag" nonce="dvm0ixsemwv20rrd"></script>

    <link rel="apple-touch-icon" sizes="180x180" type="image/png" href="image/favicon-180.png">
    <link rel="icon" sizes="32x32" type="image/png" href="image/favicon-32.png">
    <link rel="icon" sizes="128x128" type="image/png" href="image/favicon-128.png">
    <link rel="icon" sizes="192x192" type="image/png" href="image/favicon-192.png">
    <link rel="alternate" type="application/rss+xml" href="PSA/rss.txt" title="IC3 News">
    <link rel="alternate" type="application/rss+xml" href="CSA/rss.txt" title="IC3 Industry Alerts">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css" />
</head>

<body>
    <a class="usa-skipnav" href="#main-content">Skip to content</a>
    <section class="usa-banner padding-bottom-2 desktop:padding-bottom-0" aria-label="Official website of the United States government">
        <div class="usa-accordion">
            <header class="usa-banner__header">
                <div class="usa-banner__inner">
                    <div class="grid-col-auto">
                        <img aria-hidden="true" class="usa-banner__header-flag" src="image/us_flag_small.png" alt="">
                    </div>
                    <div class="grid-col-fill tablet:grid-col-auto" aria-hidden="true">
                        <p class="usa-banner__header-text">An official website of the United States government</p>
                        <p class="usa-banner__header-action">Here’s how you know</p>
                    </div>
                    <button type="button" class="usa-accordion__button usa-banner__button" aria-expanded="false" aria-controls="gov-banner-default">
                        <span class="usa-banner__button-text">Here’s how you know</span>
                    </button>
                </div>
            </header>
            <div class="usa-banner__content usa-accordion__content" id="gov-banner-default">
                <div class="grid-row grid-gap-lg">
                    <div class="usa-banner__guidance tablet:grid-col-6">
                        <img class="usa-banner__icon usa-media-block__img" src="image/icon-dot-gov.svg" role="img" alt="" aria-hidden="true">
                        <div class="usa-media-block__body">
                            <p>
                                <strong>Official websites use .gov</strong><br>
                                A <strong>.gov</strong> website belongs to an official government organization in the United States.
                            </p>
                        </div>
                    </div>
                    <div class="usa-banner__guidance tablet:grid-col-6">
                        <img class="usa-banner__icon usa-media-block__img" src="image/icon-https.svg" role="img" alt="" aria-hidden="true">
                        <div class="usa-media-block__body">
                            <p>
                                <strong>Secure .gov websites use HTTPS</strong><br>
                                A <strong>lock</strong> (
                                <span class="icon-lock">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="52" height="64" viewBox="0 0 52 64" class="usa-banner__lock-image" role="img" aria-labelledby="banner-lock-description-default" focusable="false">
                                        <title id="banner-lock-title-default">Lock</title>
                                        <desc id="banner-lock-description-default">Locked padlock icon</desc>
                                        <path fill="#000000" fill-rule="evenodd" d="M26 0c10.493 0 19 8.507 19 19v9h3a4 4 0 0 1 4 4v28a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V32a4 4 0 0 1 4-4h3v-9C7 8.507 15.507 0 26 0zm0 8c-5.979 0-10.843 4.77-10.996 10.712L15 19v9h22v-9c0-6.075-4.925-11-11-11z" />
                                    </svg>
                                </span>) or <strong>https://</strong> means you’ve safely connected to the .gov website. Share sensitive information only on official, secure websites.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="usa-overlay"></div>
    <header id="ic3Header" class="usa-header usa-header--basic usa-header--megamenu desktop:margin-0">
        <div class="usa-nav-container">
            <div class="usa-navbar">
                <div class="usa-logo">
                    <a href="index.php">
                        <picture>
                            <source srcset="image/ic3_logo.webp" type="image/webp">
                            <img class="usa-footer__logo-img" src="image/ic3_logo.png" alt="IC3 Logo">
                        </picture>
                    </a>
                    <em class="usa-logo__text"><a href="index.php">Internet Crime Complaint Center (IC3)</a></em>
                </div>
                <button type="button" class="usa-menu-btn">Menu</button>
            </div>
            <nav aria-label="Primary navigation" class="usa-nav">
                <button type="button" class="usa-nav__close">
                    <svg width="24" height="24" viewBox="0 0 24 24" role="img">
                        <title>Close</title>
                        <path d="M19 6.41 17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" fill="#ffffff" />
                    </svg>
                </button>
                <ul class="usa-nav__primary usa-accordion">
                    <li class="usa-nav__primary-item">
                        <a class="usa-nav-link" data-open-modal aria-controls="fileTerms" href="#fileTerms">File A Complaint</a>
                    </li>
                    <li class="usa-nav__primary-item">
                        <a class="usa-nav-link" href="index.php">Home</a>
                    </li>
                    <li class="usa-nav__primary-item">
                        <a class="usa-nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="usa-nav__primary-item">
                        <a class="usa-nav-link" href="track-order.php">Track Order</a>
                    </li>
                    <li class="usa-nav__primary-item">
                        <a class="usa-nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="usa-nav__primary-item">
                        <a class="usa-button usa-button--big" href="register.php">Register</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>