@extends('faq.faq')
@section('content') 
        <section class="module-small">
          <div class="container">
            <div class="row">
              <div class="col-sm-4 col-md-3 sidebar">
                <div class="widget">
                  <!--
                  <form role="form">
                    <div class="search-box">
                      <input class="form-control" type="text" placeholder="Search..."/>
                      <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                  </form>
                  -->
                </div>
                <div class="widget">
                  <h5 class="widget-title font-alt">Multi Tenancy</h5>
                  <ul class="icon-list">
                    <li><a href="#">Concept</a></li>
                    <li><a href="#">Good and Bad</a></li>
                    <li><a href="#">Speciality</a></li>
                    <li><a href="#">Decision</a></li>
                  </ul>
                </div>
                <!--
                <div class="widget">
                  <h5 class="widget-title font-alt">Popular Posts</h5>
                  <ul class="widget-posts">
                    <li class="clearfix">
                      <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-1.jpg" alt="Post Thumbnail"/></a></div>
                      <div class="widget-posts-body">
                        <div class="widget-posts-title"><a href="#">Designer Desk Essentials</a></div>
                        <div class="widget-posts-meta">23 january</div>
                      </div>
                    </li>
                    <li class="clearfix">
                      <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-2.jpg" alt="Post Thumbnail"/></a></div>
                      <div class="widget-posts-body">
                        <div class="widget-posts-title"><a href="#">Realistic Business Card Mockup</a></div>
                        <div class="widget-posts-meta">15 February</div>
                      </div>
                    </li>
                    <li class="clearfix">
                      <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-3.jpg" alt="Post Thumbnail"/></a></div>
                      <div class="widget-posts-body">
                        <div class="widget-posts-title"><a href="#">Eco bag Mockup</a></div>
                        <div class="widget-posts-meta">21 February</div>
                      </div>
                    </li>
                    <li class="clearfix">
                      <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-4.jpg" alt="Post Thumbnail"/></a></div>
                      <div class="widget-posts-body">
                        <div class="widget-posts-title"><a href="#">Bottle Mockup</a></div>
                        <div class="widget-posts-meta">2 March</div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="widget">
                  <h5 class="widget-title font-alt">Tag</h5>
                  <div class="tags font-serif"><a href="#" rel="tag">Blog</a><a href="#" rel="tag">Photo</a><a href="#" rel="tag">Video</a><a href="#" rel="tag">Image</a><a href="#" rel="tag">Minimal</a><a href="#" rel="tag">Post</a><a href="#" rel="tag">Theme</a><a href="#" rel="tag">Ideas</a><a href="#" rel="tag">Tags</a><a href="#" rel="tag">Bootstrap</a><a href="#" rel="tag">Popular</a><a href="#" rel="tag">English</a>
                  </div>
                </div>
                <div class="widget">
                  <h5 class="widget-title font-alt">Text</h5>The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators.
                </div>
                <div class="widget">
                  <h5 class="widget-title font-alt">Recent Comments</h5>
                  <ul class="icon-list">
                    <li>Maria on <a href="#">Designer Desk Essentials</a></li>
                    <li>John on <a href="#">Realistic Business Card Mockup</a></li>
                    <li>Andy on <a href="#">Eco bag Mockup</a></li>
                    <li>Jack on <a href="#">Bottle Mockup</a></li>
                    <li>Mark on <a href="#">Our trip to the Alps</a></li>
                  </ul>
                </div>
                -->
              </div>
              <div class="col-sm-8 col-sm-offset-1">
                <div class="post">
                  <div class="post-thumbnail">
                  <!-- <img src="assets/images/post-4.jpg" alt="Blog Featured Image"/> -->
                  </div>
                  <div class="post-header font-alt">
                    <h1 class="post-title">Multi-Tenant Web Applications</h1>
                    <div class="post-meta">By&nbsp;<a href="#">Krishna Teja</a>| 23 November | 
                    </div>
                  </div>
                  <div class="post-entry">
                    <p>It is a novel technological approach that runs the application without multiple 
                    instances for each user. With a single instance of the software, multiple users can be 
                    created with complete isolation of data and privacy.</p>
                    <p>It means in the application, every group in the organisation will have their own 
                    individual domain and its members of the team who are authorized to use the application 
                    without mixing or sharing any resource with others.</p>
                    <!--
                    <blockquote>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </blockquote>
                    -->
                    <p>This makes your data and information fully secured, which also does not allow any trespassers to access it.</p>
                    <!--
                    <ul>
                      <li>The European languages are members of the same family.</li>
                      <li>Their separate existence is a myth.</li>
                      <li>For science, music, sport, etc, Europe uses the same vocabulary.</li>
                    </ul>
                    -->
                    <!--
                    <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>
                    -->
                  </div>
                </div>
                <!--
                <div class="comments">
                  <h4 class="comment-title font-alt">There are 3 comments</h4>
                  <div class="comment clearfix">
                    <div class="comment-avatar"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/ryanbattles/128.jpg" alt="avatar"/></div>
                    <div class="comment-content clearfix">
                      <div class="comment-author font-alt"><a href="#">John Doe</a></div>
                      <div class="comment-body">
                        <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The European languages are members of the same family. Their separate existence is a myth.</p>
                      </div>
                      <div class="comment-meta font-alt">Today, 14:55 - <a href="#">Reply</a>
                      </div>
                    </div>
                    <div class="comment clearfix">
                      <div class="comment-avatar"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/draganbabic/128.jpg" alt="avatar"/></div>
                      <div class="comment-content clearfix">
                        <div class="comment-author font-alt"><a href="#">Mark Stone</a></div>
                        <div class="comment-body">
                          <p>Europe uses the same vocabulary. The European languages are members of the same family. Their separate existence is a myth.</p>
                        </div>
                        <div class="comment-meta font-alt">Today, 15:34 - <a href="#">Reply</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="comment clearfix">
                    <div class="comment-avatar"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/pixeliris/128.jpg" alt="avatar"/></div>
                    <div class="comment-content clearfix">
                      <div class="comment-author font-alt"><a href="#">Andy</a></div>
                      <div class="comment-body">
                        <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The European languages are members of the same family. Their separate existence is a myth.</p>
                      </div>
                      <div class="comment-meta font-alt">Today, 14:59 - <a href="#">Reply</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="comment-form">
                  <h4 class="comment-form-title font-alt">Add your comment</h4>
                  <form method="post">
                    <div class="form-group">
                      <label class="sr-only" for="name">Name</label>
                      <input class="form-control" id="name" type="text" name="name" placeholder="Name"/>
                    </div>
                    <div class="form-group">
                      <label class="sr-only" for="email">Name</label>
                      <input class="form-control" id="email" type="text" name="email" placeholder="E-mail"/>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Comment"></textarea>
                    </div>
                    <button class="btn btn-round btn-d" type="submit">Post comment</button>
                  </form>
                </div>
                -->
              </div>
            </div>
          </div>
        </section>
@endsection('content')