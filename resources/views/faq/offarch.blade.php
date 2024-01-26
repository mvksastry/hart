@extends('faq.faq')
@section('content') 

        <section class="module bg-dark-60 faq-page-header" data-background="{{asset('lassets/images/scshot3.png')}}">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Faq</h2>
                <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
              </div>
            </div>
          </div>
        </section>

        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <div role="tabpanel">
                  <ul class="nav nav-tabs font-alt" role="tablist">
                  
                    <li class="active">
                      <a href="#support" data-toggle="tab">
                        <span class="icon-tools-2"></span>
                        Architecture
                      </a>
                    </li>
                    
                    <li>
                      <a href="#sales" data-toggle="tab">
                        <span class="icon-tools-2"></span>
                        Reliability
                      </a>
                    </li>
                    
                    <li>
                      <a href="#quality" data-toggle="tab">
                        <span class="icon-tools-2"></span>
                        Quality
                      </a>
                    </li>

                  </ul>
                  
                  <div class="tab-content"> <!-- begin tab panel -->
                  
                    <div class="tab-pane active" id="support">
                      <div class="panel-group" id="accordion">
                      
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title font-alt">
                              <a data-toggle="collapse" data-parent="#accordion" href="#support1">
                                Q: Is the office based on good architecture, Is it reliable?
                              </a>
                            </h4>
                          </div>
                          <div class="panel-collapse collapse in" id="support1">
                            <div class="panel-body">The architecture of HART is based one of the best and most deployed architecture.
                            It is Model (database) - View (What the user sees) - Controller (the nodal point that handles user requests). 
                            One of the first, most reliable architecture coupled with one of the most used server side scripting.
                            With, if one adds, highly structured coding practices, the result is easily scalable, customizable and highly effective.
                            If not HART, choose any if only they satisfy the above criteria. 
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title font-alt">
                              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support2">
                                Q: Will my office run stably?
                              </a>
                            </h4>
                          </div>
                          <div class="panel-collapse collapse" id="support2">
                            <div class="panel-body">
                              Meissa HART is developed through modern building approach, through TEST, VALIDATE and DEVELOP with parallel processing.
                              By the time you login as a user, it has already undergone serveral humdred times of the same process you are about to begin. 
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    
                    <div class="tab-pane" id="sales">
                      <div class="panel-group" id="accordion">
                      
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title font-alt">
                              <a data-toggle="collapse" data-parent="#accordion" href="#sales1">
                                Will I get reliable support after purchase?
                              </a>
                            </h4>
                          </div>
                          <div class="panel-collapse collapse in" id="sales1">
                            <div class="panel-body">
                              In one word, ABSOLUTELY. Every subscriber or on-site self hosting
                              entity will receive support as per subscribed plan. Period.
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title font-alt">
                              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#sales2">
                                What if I don't get my issue resolved?
                              </a>
                            </h4>
                          </div>
                          <div class="panel-collapse collapse" id="sales2">
                            <div class="panel-body">
                              We host the application in a Multi-tenancy environment. Every other user
                              also gets affected if Meissa doesnot resolve the issue immediately.
                              It is like power outage in a whole town/city. We make sure that the application is running
                              with its full potential by deploying a parallel running version. At Meissa we maintain
                              a mirror image always. The image will get restored under 17 min maximum!
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    
                    <div class="tab-pane" id="quality">
                      <div class="panel-group" id="accordion">
                      
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title font-alt">
                              <a data-toggle="collapse" data-parent="#accordion" href="#quality1">
                                What are the qualities of HART-Office 
                              </a>
                            </h4>
                          </div>
                          <div class="panel-collapse collapse in" id="quality1">
                            <div class="panel-body">
                              HART, as the acronym suggests, keep your office running based on roles, permissions and access-controls.
                              Only the information an employee is authorized to access is provided. 
                              Only a permitted action is allowed to take place. Eg. Only when allowed 
                              to view a piece of information is shown, forget editing or deleting it.
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title font-alt">
                              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#quality2">
                                What if my employees try to penetrate to access unauthorized information?
                              </a>
                            </h4>
                          </div>
                          <div class="panel-collapse collapse" id="quality2">
                            <div class="panel-body">
                            HART employees, authorizations, gates, roles and permissions. 
                            It is virtually impossible to access the random codes generated by the software
                            to access an un-authorized piece of information. This can only happen, if
                            an employee shares his credentials to an unauthorized person. 
                            Even such an occurence is preventable as audit trails make most 
                            malicious activities tracable.
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>  
                    
                  </div> <!-- / end of tab panel -->
                  
                </div>
              </div>
            </div>
          </div>
        </section>
        <hr class="divider-d">
@endsection('content')