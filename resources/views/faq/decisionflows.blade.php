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
              <li><a href="#">Roles Based Routing</a></li>
              <li><a href="#">Permissions Based Execution</a></li>
              <li><a href="#">Decisions</a></li>
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
              <h1 class="post-title">Decision Flows: The Beating HART of Office!</h1>
              <div class="post-meta">By&nbsp;<a href="#">Krishna Teja</a>| 23 November |
              </div>
            </div>
            <div class="post-entry">
              <p>
              <b><h4>The Decisions</h4></b>
               <blockquote>
                <p>The best and most difficult phase of a flight is landing. Take-off is optional landing is mandatory!</p>
              </blockquote>
              
              <p>
                Most well trained captains, land the plane semi-manual. Human judgement over-rides 
                machine. Machines can do number crunching well but human brain, experience should 
                reflect the aptness.
              </p>
              
              <p>
                A successful office or a software should reflect this approach. Where necessary one 
                can on-line reroute the decsion to seek an extra opinion. If extra opinion is 
                not needed, it should go the routine way. This HART precisely does that.
              </p>
                            
              <p><b><h5>Roles Based Routing</h5></b>
                <ul>
                  <li>In HART you can change to path of a decision based on role</li>
                  <li>Get opinion of an extra role. Eg. To take a decision, you may sometimes 
                  seek the opinion of a finance chief which otherwise not needed.</li>
                  <li>You can manually dictate the route in a few clicks</li>
                </ul>
              </p>
              
              <p><b><h5>Permissions Based Execution</h5></b>
                <ul>
                  <li>If an employee is on leave but work must go-on. Assign permission to anyone on-line.
                      The Director being the highest authority has global permissions he can override everything.
                  </li>
                  <li>Obviously once no permission, the work does not go further.</li>
                  <li>Access to information is only permitted based role.</li>
                </ul>                    
              </p>
              
              <p><b><h5>Decisions</h5></b>
                <ul>
                  <li>Eventually all decisions be tracked with documentary proof tracked online.</li>
                  <li>Even decision taken earlier can be revisted to take note of that situation.</li>
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