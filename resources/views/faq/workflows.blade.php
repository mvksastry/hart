@extends('faq.faq')
@section('content') 
  <section class="module-small">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-md-3 sidebar">
          <div class="widget">
            <form role="form">
              <div class="search-box">
                <input class="form-control" type="text" placeholder="Search..."/>
                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </form>
          </div>
          <div class="widget">
            <h5 class="widget-title font-alt">HART Overview</h5>
            <ul class="icon-list">
              <li><a href="#">Office</a></li>
              <li><a href="#">Roles</a></li>
              <li><a href="#">Permissions</a></li>
              <li><a href="#">Decisions</a></li>
              <li><a href="#">Documentation</a></li>
            </ul>
          </div>
          <div class="widget">
            <h5 class="widget-title font-alt">Module Overview</h5>
            <ul class="widget-posts">
              <li class="clearfix">
                <div class="widget-posts-image"><a href="#"><img src="{{asset('lassets/images/rp-1.jpg')}}" alt="Post Thumbnail"/></a></div>
                <div class="widget-posts-body">
                  <div class="widget-posts-title"><a href="#">Project Tracking System</a></div>
                  <div class="widget-posts-meta">Last Updated: 23 january</div>
                </div>
              </li>
              <li class="clearfix">
                <div class="widget-posts-image"><a href="#"><img src="{{asset('lassets/images/rp-2.jpg')}}" alt="Post Thumbnail"/></a></div>
                <div class="widget-posts-body">
                  <div class="widget-posts-title"><a href="#">Intra Office Communications</a></div>
                  <div class="widget-posts-meta">Last Updated: 15 February</div>
                </div>
              </li>
              <li class="clearfix">
                <div class="widget-posts-image"><a href="#"><img src="{{asset('lassets/images/rp-3.jpg')}}" alt="Post Thumbnail"/></a></div>
                <div class="widget-posts-body">
                  <div class="widget-posts-title"><a href="#">Leaves - Tours </a></div>
                  <div class="widget-posts-meta">21 February</div>
                </div>
              </li>
   
              <li class="clearfix">
                <div class="widget-posts-image">
                  <a href="#">
                  <img src="{{asset('lassets/images/rp-4.jpg')}}" alt="Post Thumbnail"/>
                  </a>
                </div>
                <div class="widget-posts-body">
                  <div class="widget-posts-title"><a href="#">Document Tracking</a></div>
                  <div class="widget-posts-meta">2 March</div>
                </div>
              </li>
            </ul>
          </div>
          <div class="widget">
            <!--
            <h5 class="widget-title font-alt">Tag</h5>
            <div class="tags font-serif">
              <a href="#" rel="tag">Blog</a>
              <a href="#" rel="tag">Photo</a>
              <a href="#" rel="tag">Video</a>
              <a href="#" rel="tag">Image</a>
              <a href="#" rel="tag">Minimal</a>
              <a href="#" rel="tag">Post</a>
              <a href="#" rel="tag">Theme</a>
              <a href="#" rel="tag">Ideas</a>
              <a href="#" rel="tag">Tags</a>
              <a href="#" rel="tag">Bootstrap</a>
              <a href="#" rel="tag">Popular</a>
              <a href="#" rel="tag">English</a>
            </div>
            -->
          </div>
          <div class="widget">
            <h5 class="widget-title font-alt">Comments</h5>
            Comments are disabled at present. However, you are most welcome submit your opinion.
          </div>

        </div>
        <div class="col-sm-8 col-sm-offset-1">
          <div class="post">
            <div class="post-thumbnail"><img src="{{asset('lassets/images/post-4.jpg')}}" alt="Blog Featured Image"/></div>
            <div class="post-header font-alt">
              <h1 class="post-title">HART - Overview: How is it wired inside?</h1>
              <div class="post-meta">By&nbsp;<a href="#">Krishna Teja</a>| 23 November |
              </div>
            </div>
            <div class="post-entry">
              <p>
              <b><h4>HART Office</h4></b>
              It is needless to elaborate functining of a successful office involves well defined
              hirearchial system in which decisions are taken without delay, accepting responsibility
              judicious tracking of expenses and eventual acceptance of the decsions.
              </p>
              
              <p><b><h5>Fundamentals</h5></b>
              Everyone must take decisions under their role and permissions accorded to them</p>
              <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
              </blockquote>
              <p>If a permission is not present to take, it should automatically be referred to 
              next higher authority, and so to eventually reach the highest authority. 
              If everything is reaching the highest authority means no-one is taking 
              decisions at their level.</p>
              
              <p>Exceptions to situations should arise when no known path or precedence to take a final call. 
              The aim of a successful office or a software is keep these exceptions to a minimum. Hence, 
              the work flow has to include elements of automatic routing and then the final decisions. </p>
              
              <p><b><h5>Roles</h5></b>
                <ul>
                  <li>HART begins with a Roles to all employees. Eg. The Director >> Administrative Officer >> Supervisors >> Employees
                      The Director being the highest authority.</li>
                  <li>Every Role in the above has certain previleges to access the information, it could be confidential or open<./li>
                  <li>Access to information is only permitted based role</li>
                </ul>
              </p>
              
              <p><b><h5>Permissions</h5></b>
                <ul>
                  <li>Every role has certain permissions. Eg. to view a noting or a file or decision taken by hirearchially lower roles.
                      The Director being the highest authority has global permissions can see, access, comment, on everthing,.</li>
                  <li>Obviously once no permission, the work does not go further.</li>
                  <li>Access to information is only permitted based role.</li>
                </ul>                    
              </p>
              
              <p><b><h5>Decisions</h5></b>
                <ul>
                  <li>Every situation has primarily three outcomes. Yes, No or No-decision.</li>
                  <li>All three have to be based established rules of an office.</li>
                  <li>Where applicable, enclose documentary proof for taking that decision.</li>
                </ul>                    
              </p>                    
              
               <p><b><h5>Documentation</h5></b>
                <ul>
                  <li>HART provides uploading of documents pertaining to every online transaction.</li>
                  <li>The word transaction is not money related but a file moving from place to place with notings associated with it.</li>
                  <li>Every comment made on a decision is recorded with time stamp.</li>
                </ul>                    
              </p>                    
              
              
              <p></p>
            </div>
          </div>                
        </div>
      </div>
    </div>
  </section>
@endsection('content')