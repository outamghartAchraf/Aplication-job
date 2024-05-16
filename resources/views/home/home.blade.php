@extends('layouts.app')
@section('filecss')

@endsection

@section('title','Home')
@section('content')

<section class="hero_section  ">

      <div class="hero_section1">
            <h2>Find Best Dream</h2>
            <h1>Job In All Over The World</h1>
            <h2>Loking for a employer</h2>
      </div>


      <div class="hero_section2" id="animContainer">

      </div>
</section>

<div class="containt_comapny_icon effectAnimation"  >
      <h1 style="text-align:center;">MORE THAN <span>+100</span> COMAPNY TRISHTED US</h1>
      <div class="section_icon_company">

            <img src="/images/google.png" class="img_company" alt="goole">
            <img src="/images/microsoft.png" class="img_company" alt="microsoft">
            <img src="/images/figma.png" class="img_company" alt="figma">
            <img src="/images/amason.png" class="img_company" alt="amason">
            <img src="/images/facebook.png" class="img_company" alt="amason">

      </div>
</div>

<!-- 
      Section ABOUT
 -->
<section class="about effectAnimation "  >

      <div class="section_about1">
            <div class="box_image_about">
                  <img src="/images/about.png">
            </div>
      </div>

      <div class="section_about2"  >
            <h1>About</h1>
            <p class="text_about_me">

                  A job seeker and company platform serves as a vital intermediary,
                  facilitating the connection between individuals seeking employment
                  opportunities and organizations looking to hire talent.
                  These platforms offer a wealth of features tailored to the needs of both job
                  seekers and companies, fostering a symbiotic relationship between the two.
                  For job seekers, these platforms provide intuitive job search functionalities,
                  allowing them to browse through a diverse array of job listings based on their
                  preferences and qualifications. Through personalized profiles, job seekers can
                  showcase their skills, experiences, and career objectives, enabling recruiters
                  <span class="text_read_more" id="text_read_more">
                  to identify suitable candidates more efficiently. Job seekers also benefit
                  from application tracking tools and job alerts, ensuring they stay informed
                  about relevant job opportunities and the status of their applications.
                  On the other hand, companies leverage these platforms to streamline their
                  recruitment processes, posting job listings, accessing candidate profiles,
                  and managing applications seamlessly. With advanced features and resources
                  designed to enhance the recruitment experience for both job seekers and companies,
                  these platforms play a pivotal role in driving successful matches between talent and organizations, ultimate
                  ly contributing to the growth and success of both parties in the job market.
                  </span>

                  
            </p>

            <span class="btn btn-outline-primary read_more" id="btn_read_more">Read more</span>
      </div>

</section>


<section class="how_to_works effectAnimation"  >
      <h1 class="title_how_it_works">How it Works</h1>
      <div class="allsetep">

            <div class="setep">
                  <img src="/images/account.png">
                  <h4>Create Account</h4>
            </div>

            <div class="setep">
                  <img src="/images/search.png">
                  <h4>Search a Job</h4>
            </div>

            <div class="setep">
                  <img src="/images/cv.png">
                  <h4>Apply Cv</h4>
            </div>

            <div class="setep">
                  <img src="/images/apply.png">
                  <h4>Apply a Job</h4>
            </div>


      </div>

</section>

<div class="Bigsection_card_job  " id="jobs" >
      <h1>All Job</h1>
      <div class="select_type_job">

            <div class="dropdown"  >
                  <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Salary
                  </button>
                  <ul class="dropdown-menu"   >
                        <li><a class="dropdown-item" href="{{route('listing.index',['sort' => 'salary_high_to_low'])}}">High to low</a></li>
                        <li><a class="dropdown-item" href="{{route('listing.index',['sort' => 'salary_low_to_high'])}}">Low to high</a></li>

                  </ul>

                  <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Date
                  </button>
                  <ul class="dropdown-menu"  style="z-index: 29;">
                        <li><a class="dropdown-item" href="{{route('listing.index',['date' => 'latest'])}}">Latest</a></li>
                        <li><a class="dropdown-item" href="{{route('listing.index',['date' => 'oldest'])}}">Oldest</a></li>
                  </ul>

                  <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Job type
                  </button>
                  <ul class="dropdown-menu"  style="z-index: 12;">
                        <li><a class="dropdown-item" href="{{route('listing.index',['job_type' => 'Fulltime'])}}">Fulltime</a></li>
                        <li><a class="dropdown-item" href="{{route('listing.index',['job_type' => 'Parttime'])}}">Parttime</a></li>
                        <li><a class="dropdown-item" href="{{route('listing.index',['job_type' => 'Casual'])}}">Casual</a></li>
                        <li><a class="dropdown-item" href="{{route('listing.index',['job_type' => 'Contract'])}}">Contract</a></li>
                  </ul>
            </div>



      </div>
</div>



<section class=" " >
   
   <div class="section_card_job  "   >
   @foreach($jobs as $job)
      <div class="card_job">

            <div class="{{$job->job_type}}">
                  {{$job->job_type}}
            </div>


            <div class="logo_and_title">
                  <div class="box_logo">
                        <img src="{{Storage::url($job->profile->profile_pic)}}">
                  </div>

                  <div class="title_jobss">{{$job->title}}</div>
            </div>
            <hr>

            <div class="name">{{$job->profile->name}}</div>

            <div class="price_job_and_apply">
                  <div class="price">${{ number_format($job->salary) }}</div>

                  <div class="btnbtn">
                        <a href="{{route('jobs.show',$job->slug)}}" class="btn_apply_job">Apply</a>
                  </div>

            </div>
      </div>

      @endforeach

   </div>
     
<div> 
      {{ $jobs->links() }}
</div>
</section>



<section class="listpracing  effectAnimation" id="pricing">

      <h1 class="title_listPricing">Pricing List</h1>

      <div class="pricing">
            <div class="card">
                  <div class="content">
                        <h4>Weekly Plan</h4>
                        <h3>$20</h3>
                        <p>
                              <i class="ri-checkbox-circle-line"></i>
                              Smart coding plan
                        </p>
                        <p>
                              <i class="ri-checkbox-circle-line"></i>
                              At home workouts
                        </p>
                  </div>

                  <a href="{{route('sub.weekly')}}" class="btn">Join Now</a>


            </div>
            <div class="card">
                  <div class="content">
                        <h4>Monthly Plan</h4>
                        <h3>$80</h3>
                        <p>
                              <i class="ri-checkbox-circle-line"></i>
                              Pro codes
                        </p>
                        <p>
                              <i class="ri-checkbox-circle-line"></i>
                              Smart coding plan
                        </p>
                        <p>
                              <i class="ri-checkbox-circle-line"></i>
                              At home workouts
                        </p>
                  </div>
                  <a href="{{route('sub.monthly')}}" class="btn">Join Now</a>
            </div>
            <div class="card">
                  <div class="content">
                        <h4>Yearly Plan</h4>
                        <h3>$200</h3>
                        <p>
                              <i class="ri-checkbox-circle-line"></i>
                              Elite Classes & Courses
                        </p>
                        <p>
                              <i class="ri-checkbox-circle-line"></i>
                              Pro codes
                        </p>
                        <p>
                              <i class="ri-checkbox-circle-line"></i>
                              Personal Coaching
                        </p>
                        <p>
                              <i class="ri-checkbox-circle-line"></i>
                              Smart coding plan
                        </p>
                        <p>
                              <i class="ri-checkbox-circle-line"></i>
                              At home workouts
                        </p>
                  </div>
                  <a href="{{route('sub.yearly')}}" class="btn">Join Now</a>
            </div>
      </div>
</section>

<section class="contact-us   " id="contact">
<h1 class="title">
        <span class="icon icon-envelope"></span>
        Contact Me
      </h1>
      <p class="sub-title">
        contact us for more information and get notified when i publish
        something new
      </p>
      <div class="" id="messageSuccess"></div>
      <div class="bigcontact">
        <form id="formCONTACT" method="POST" action="#" > 
          <div class="bigemail">
            <label  For="email">Email Address:</label>
            <input
             
              name="email"
              required
              type="email"
              id="email"
              require
            />
 
          </div>

          <div class="bigmessage">
            <label  For="message">Your message:</label>
            <textarea required name="message" id="message" require></textarea>
            
          </div>

          <button class="submit"    id="btnSubmit" >
            SEND
          </button>

          
        </form>

        <div class="sec-animation  " id="animtionConatct">
           
        </div>
      </div>
   
</section>
 




 

@endsection


@section('filejs')
<script>
      window.addEventListener('beforeunload', function() {
            localStorage.setItem('scrollPosition', window.scrollY);
      });

      // Restore scroll position after page reload
      window.addEventListener('load', function() {
            var scrollPosition = localStorage.getItem('scrollPosition');
            if (scrollPosition !== null) {
                  window.scrollTo(0, scrollPosition);
                  localStorage.removeItem('scrollPosition'); // Remove stored position after restoring
            }
      });
</script>



<script>
      var animation = bodymovin.loadAnimation({
            container: document.getElementById('animContainer'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: '/js/home.json'
      })
</script>


<script>
      var animation = bodymovin.loadAnimation({
            container: document.getElementById('animtionConatct'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: '/js/contact.json'
      })
</script>

<script>
    var url = "{{route('contactus')}}";
    document.getElementById('btnSubmit').addEventListener("click",(even)=>{
    var formCONTACT = document.getElementById('formCONTACT');
    var messageSuccess = document.getElementById('messageSuccess');
    messageSuccess.innerHTML ="" ;
    var formdata = new FormData(formCONTACT);

    var button = even.target ;
    button.disabled = true ;
    button.innerHTML = 'Sending Email...';

    fetch(url,{
        method:"POST",
        headers:{
            'X-CSRF-TOKEN' : '{{csrf_token()}}'
        },
        body:formdata
    }).then(res =>{
        if(res.ok){
            return res.json();
        }else{
            throw new Error('error');
        }
    }).then(data =>{
        button.innerHTML = "register";
        button.disabled = false ;
        messageSuccess.innerHTML = 
        '<div class="alert alert-success">THANK YOU FOR CONATCT US !!</div>'
         

    }).catch(err =>{
        button.innerHTML = "register" ;
        button.disabled = false ;
        messageSuccess.innerHTML = 
        '<div class="alert alert-danger">somthing wrong please try again !!</div>'

    })
    
    
    
    ;
        
    })

</script>

<script>
      var btn_read_more = document.getElementById('btn_read_more');
      btn_read_more.addEventListener("click",()=>{
             
            document.getElementById('text_read_more').classList.toggle('apply_display_block');

            btn_read_more.textContent = btn_read_more.textContent.includes('Read more') ? "Read Less..." : "Read More...";
      }) 
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var about = document.querySelector('.about');
        
        
        var company = document.querySelector('.containt_comapny_icon');
    
        var how_to_works = document.querySelector('.how_to_works');

        var listpracing = document.querySelector('.listpracing');

        
       
        var contact_us = document.querySelector('.contact-us');
       

      
       
        window.addEventListener('scroll', function() {
            if (window.scrollY >= about.offsetTop - 200) {
                about.classList.add('myanimationStyle');
                about.style.opacity = '1';
                about.style.transform = 'translateY(0px)';
                 
               
            }

            if (window.scrollY >= company.offsetTop - 200) {
                  company.classList.add('myanimationStyle');
                
                company.style.opacity = '1';
                company.style.transform = 'translateY(0px)';
               
            }

           


            if (window.scrollY >= how_to_works.offsetTop - 130) {
                  how_to_works.classList.add('myanimationStyle');
                
                  how_to_works.style.opacity = '1';
                  how_to_works.style.transform = 'translateY(0px)';
               
            }

            if (window.scrollY >= listpracing.offsetTop - 130) {
                  listpracing.classList.add('myanimationStyle');
                
                  listpracing.style.opacity = '1';
                  listpracing.style.transform = 'translateY(0px)';
               
            }

 

            
            
            
            
            


        });
    });
</script>

 

@endsection