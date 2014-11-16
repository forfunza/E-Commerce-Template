<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    
                    <div class="panel-body">
                        
                  
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Information</h3>
                                <div class="well">
                                    <address>
                                        <strong>Name : </strong>  {{ $servicediscount->firstname.' '.$servicediscount->lastname }}<br>
                                        <strong>Email : </strong>  {{ $servicediscount->email }}<br>
                                      	<strong>Tel : </strong>  {{ $servicediscount->tel }}<br>
                                      	<strong>Address : </strong>  {{ $servicediscount->address }}

                                    </address>
                                    <address>
                                        
                                        
                                        <strong>Branch : </strong>  {{ $servicediscount->branch }}<br>
                                        <strong>Contact : </strong>  {{ $servicediscount->contact }}<br>
                                        <strong>Problem : </strong><br>
                                       
                                           {{ $servicediscount->problem}}
                                        <br>
                                        
                                        
                                    </address>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </section>
            </div>
            
        </div>