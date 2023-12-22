<style>
      #service-page {
        background-image: linear-gradient(rgba(15, 7, 50, 0.079), rgba(12, 3, 51, 0.084)),
            url('<?php echo url("assets/img/strips/Umdoni-Reception_strip.jpg") ?>');
        min-height: 40vh;
        position: relative;
        background-repeat: no-repeat;
        background-size: cover;

    }

        
    #service-page p{
        bottom: 0px;
        position: absolute;
        font-size: 8em !important;
    }

    nav {
        width: 100%;
        position: relative;
        top: 0;
        left: 0;
        padding: 8px 1%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        z-index: 20;
        background-color: #fff;
        color: #000;
    }

    nav ul li a {
        color: #000;
    }

    nav ul li i {
        color: #000;
    }
</style>


<div class="container-fluid" id="service-page">
    <div class="row">
        <div class="tag-header">
            <div class="col">
            <p class="h1 m-5 fs-1 text-white">
                Contact Us
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">
        <p class="fw-lighter fs-3 my-5">
            We value your feedback and inquiries. Reach out to us using the contact form below, and we'll respond promptly.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form method="post" class="form" action="save" enctype="multipart/form-data">
                <p class="fs-2">Contact Form</p>
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="col-md-4">
                        <label for="basicInput">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="col-md-4">
                        <label for="basicInput">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary mt-5">
                                <i class="bi bi-send-fill"></i> Send
                            </button>
                        </div>
                    </div>
                </div>
            </form>




            <div class="text-center mt-5">
                <p>Our support Hotline is available 24 Hours a day</p>
                <p class="fw-normal"> <i class="bi bi-headset"></i> +2787 286 5329</p>
            </div>
        </div>
        <div class="col-md-4">

            <p class="fs-2">Address</p>
            <p class="fw-bold">Location:</p>
            <p class="">Cnr Bram Fischer & Williamson Street,
                Scottburg, KwaZulu Natal, 4180, South Africa</p>
            <p class="fw-bold">Postal Address:</p>
            <p class="fw-normal">
                P.O. Box 19 <br />
                Scottburgh <br />
                4180
            </p>
            <p class="fw-bold">Phone:</p>

            <p class="fw-normal"> <i class="bi bi-telephone-fill"></i> 039 976 1202 </p>
            <p class="fw-normal"> <i class="bi bi-printer-fill"></i> 039 976 2194</p>
            <p class="fs-2">Business Hours</p>
            <p class="fw-bold">Monday-Friday</p>
            <p class="fw-normal">7:30am - 4:00pm</p>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12 my-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d155840.16900763908!2d30.619267503120614!3d-30.33350232500717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1ef63980635c50af%3A0x2513bb216b157d25!2sUmdoni%20Municipality!5e0!3m2!1sen!2sza!4v1698614737033!5m2!1sen!2sza" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
<section