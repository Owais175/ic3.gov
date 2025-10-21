@extends('front.app')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
@endsection

@section('content')
    <main id="main-content" class="usa-prose grid-container">

        <section class="faq-pg">
            <h2>Frequently Asked Questions (FAQ)
            </h2>
            <h2>Cyber Rapid Action Unit (CRAU)
            </h2>
            <p>(An Initiative of the Government of India under the Ministry of Home Affairs, in coordination with I4C & CBI)
            </p>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            1. What kind of information should I provide while filing a complaint?
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>When registering a complaint on the <strong>Cyber Rapid Action Unit (CRAU)</strong> portal,
                                you are required
                                to provide accurate and verifiable information related to the incident. Depending on the
                                nature of your case, you may be asked to upload:</p>
                            <ul>
                                <li>
                                    <p>Details of the incident (date, time, platform, or medium used)
                                    </p>
                                </li>
                                <li>
                                    <p>Screenshots, emails, URLs, or digital evidence supporting your claim
                                    </p>
                                </li>
                                <li>
                                    <p>Contact information of involved parties (if available)

                                    </p>
                                </li>
                                <li>
                                    <p>Financial transaction records (in case of fraud or phishing)

                                    </p>
                                </li>
                                <li>
                                    <p>Description of how the incident occurred

                                    </p>
                                </li>
                            </ul>
                            <p>Providing complete and factual information enables CRAU to triage your case efficiently and,
                                if necessary, escalate it for central-level investigation in coordination with <strong>MHA,
                                    I4C</strong>, and
                                <strong>CBI</strong>.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            2. Which State/UT should I select while reporting a complaint?

                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>If the incident occurred within a specific State or Union Territory, please select the
                                respective location from the dropdown menu.</p>
                            <p>However, if your case involves:</p>
                            <ul>
                                <li>
                                    <p>Multiple States or cross-border activity, or
                                    </p>
                                </li>
                                <li>
                                    <p>National-level implications, <br>
                                        it may be automatically reviewed by CRAU for central coordination and investigation
                                        through <strong>I4C</strong> and <strong>CBI</strong>.
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            3. How can I file complaints about other forms of cybercrime?

                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>You may file complaints related to:
                            </p>
                            <ul>
                                <li>
                                    <p>Financial fraud (UPI, banking, or digital wallet scams)
                                    </p>
                                </li>
                                <li>
                                    <p>Online harassment or impersonation

                                    </p>
                                </li>
                                <li>
                                    <p>Unauthorized access or hacking

                                    </p>
                                </li>
                                <li>
                                    <p>Data theft or ransomware

                                    </p>
                                </li>
                                <li>
                                    <p>Phishing or identity fraud

                                    </p>
                                </li>
                            </ul>
                            <p>To file a complaint, navigate to <strong>Register a Complaint</strong> on the CRAU website.
                                Provide the
                                requested details and evidence, and submit the form through the secure CRAU complaint
                                portal.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
                            4. What type of information is considered valid evidence?
                        </button>
                    </h2>
                    <div id="flush-collapsefour" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>The following materials may be submitted as valid evidence when filing a complaint:

                            </p>
                            <ul>
                                <li>
                                    <p>Credit/debit card statement
                                    </p>
                                </li>
                                <li>
                                    <p>Bank transaction receipt or SMS proof

                                    </p>
                                </li>
                                <li>
                                    <p>Screenshot of fraudulent messages or profiles
                                    </p>
                                </li>
                                <li>
                                    <p>URLs, email headers, or source code samples

                                    </p>
                                </li>
                                <li>
                                    <p>Copies of relevant communication or chat logs

                                    </p>
                                </li>
                                <li>
                                    <p>Images or video clips containing evidence


                                    </p>
                                </li>
                                <li>
                                    <p>Suspect phone numbers or digital IDs

                                    </p>
                                </li>
                                <li>
                                    <p>Any other document that supports your report

                                    </p>
                                </li>
                            </ul>
                            <p>Please ensure that all attachments are authentic and unaltered. Submitting false evidence is
                                an offense under Indian laws.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
                            5. What action will be taken after I file a complaint?

                        </button>
                    </h2>
                    <div id="flush-collapsefive" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>Once a complaint is received, CRAU reviews the content for severity and legitimacy.
                            </p>
                            <ul>
                                <li>
                                    <p>Minor or local-level incidents are directed to respective State Cyber Cells.</p>
                                </li>
                                <li>
                                    <p>High-impact, organized, or national-level threats are escalated for coordinated
                                        investigation with <strong>MHA, I4C</strong>, and <strong>CBI</strong>.
                                    </p>
                                </li>
                                <li>
                                    <p>Complainants may be contacted for further verification or to provide additional
                                        details.
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapsesix" aria-expanded="false" aria-controls="flush-collapsesix">
                            6. Can I report a complaint without uploading any documents?

                        </button>
                    </h2>
                    <div id="flush-collapsesix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>While some information fields are mandatory, supporting documents strengthen your case and
                                allow quicker assessment. Incomplete submissions may delay review or verification.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseseven" aria-expanded="false" aria-controls="flush-collapseseven">
                            7. What happens once I report a complaint?
                        </button>
                    </h2>
                    <div id="flush-collapseseven" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>Your complaint will be securely logged and forwarded to the relevant cyber enforcement
                                division. CRAU ensures that every complaint receives a unique reference number for status
                                tracking and follow-up through the integrated system.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseeight" aria-expanded="false"
                            aria-controls="flush-collapseeight">
                            8. Will I be informed once my complaint is successfully submitted?
                        </button>
                    </h2>
                    <div id="flush-collapseeight" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>Yes. After submission, you will receive an <strong>Acknowledgement Number</strong> via email
                                or SMS (as
                                provided). You can use this number to check the progress or outcome of your complaint.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapsenine" aria-expanded="false"
                            aria-controls="flush-collapsenine">
                            9. Can I check the status of my complaint?

                        </button>
                    </h2>
                    <div id="flush-collapsenine" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>Yes. Log in to the CRAU Complaint Portal and use your acknowledgement number to view the
                                investigation status or updates shared by the concerned agency.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseten" aria-expanded="false" aria-controls="flush-collapseten">
                            10. Can I withdraw my complaint from the portal?
                        </button>
                    </h2>
                    <div id="flush-collapseten" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>Yes, you may request withdrawal only if the complaint is still under preliminary review. Once
                                the case is transferred to an investigating agency, it can no longer be withdrawn directly
                                through the portal.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseeleven" aria-expanded="false"
                            aria-controls="flush-collapseeleven">
                            11. What is a Hash Value and its purpose?
                        </button>
                    </h2>
                    <div id="flush-collapseeleven" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>A <strong>hash value</strong> is a unique digital signature assigned to each uploaded file or
                                document. It
                                helps ensure that the evidence submitted remains unaltered throughout the investigation.
                                CRAU uses hash validation to maintain the integrity of digital evidence.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapsetweleve" aria-expanded="false"
                            aria-controls="flush-collapsetweleve">
                            12. Can I file a complaint if I am an Indian citizen but have been victimized online by a
                            foreign national or company?
                        </button>
                    </h2>
                    <div id="flush-collapsetweleve" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>Yes. Indian citizens victimized in cyberspace by individuals or organizations based abroad
                                may register their complaints through the CRAU portal.
                            </p>
                            <p>Such cases are analyzed for international cooperation and referred to competent authorities
                                for further legal actio</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapsethirteen" aria-expanded="false"
                            aria-controls="flush-collapsethirteen">
                            13. Can non-residents or foreigners report cases through CRAU?
                        </button>
                    </h2>
                    <div id="flush-collapsethirteen" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>Foreign nationals or residents affected by cyber incidents involving Indian digital
                                infrastructure or users may also file complaints through the CRAU portal. Such reports are
                                coordinated in accordance with applicable Indian and international legal frameworks.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapsefourteen" aria-expanded="false"
                            aria-controls="flush-collapsefourteen">
                            14. What should I do if I receive suspicious messages or links?
                        </button>
                    </h2>
                    <div id="flush-collapsefourteen" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>Do not click, download, or respond. Immediately take a screenshot and report the incident
                                through CRAU’s complaint form. This helps national cyber intelligence units trace and
                                prevent similar attacks.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapsefifteen" aria-expanded="false"
                            aria-controls="flush-collapsefifteen">
                            15. Is the information I provide secure?
                        </button>
                    </h2>
                    <div id="flush-collapsefifteen" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>Yes. All data submitted through CRAU’s official portal is encrypted using <strong>Secure
                                    Socket Layer
                                    (SSL)</strong> technology and stored within <strong>Government of India</strong> data
                                centers.

                            </p>
                            <p>Access is strictly limited to authorized officers under <strong>MHA, I4C</strong>, and
                                <strong>CBI</strong>
                                supervision.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
@endsection
