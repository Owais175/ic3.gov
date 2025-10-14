<?php include "include/header.php" ?>

<main id="main-content" class="usa-prose grid-container">

    <section class="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-fill-contact register-forms">
                        <form id="contactForm">
                            <h3>Login </h3>
                            <div class="field-grid">

                                <div>
                                    <label for="email">Email address</label>
                                    <input id="email" name="email" type="email" required aria-required="true" placeholder="you@example.com">
                                </div>
                            </div>

                            <div class="field-grid">
                                <div>
                                    <label for="phone">Password</label>
                                    <input id="password" name="password" type="password" placeholder="">
                                </div>

                            </div>
                            <div class="actions">
                                <button type="submit" class="usa-button usa-button--big" id="submitBtn">Login</button>
                            </div>
                        </form>
                        <form id="contactForm">
                            <h3>Sign Up </h3>
                            <div class="field-grid">
                                <div>
                                    <label for="name">Full name</label>
                                    <input id="name" name="name" type="text" required aria-required="true" placeholder="Jane Doe">
                                </div>
                            </div>
                            <div class="field-grid">

                                <div>
                                    <label for="email">Email address</label>
                                    <input id="email" name="email" type="email" required aria-required="true" placeholder="you@example.com">
                                </div>
                            </div>

                            <div class="field-grid">
                                <div>
                                    <label for="phone">Password</label>
                                    <input id="password" name="password" type="password" placeholder="">
                                </div>

                            </div>
                            <div class="field-grid">
                                <div>
                                    <label for="phone">Confirm Password</label>
                                    <input id="password" name="password" type="password" placeholder="">
                                </div>
                            </div>

                            <div class="actions">
                                <button type="submit" class="usa-button usa-button--big" id="submitBtn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>


<?php include "include/footer.php" ?>