@include('internal_layout.header')
@include('internal_layout.leftbar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $content_title }}
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{ $content_title }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            Today Tracking
                        </div><!-- /.box-header -->
                        <div class="box-body">


                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 40px;">Sr.No</th>
                                            <th>Publisher Id</th>
                                            <!-- <th>Windows</th> -->
                                            <th>Copy Links</th>
                                            <th>Download Button</th> 
                                            <th>Total</th> 
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if ($all_users) {
                                           
                                            foreach ($all_users as $key => $nod) {
                                                
                                                $count = array();
                                                $copy_link = array();
                                                $downloads = array();
                                                $uniqueCollection = $nod->stat_today_download->unique(function ($item) {
                                                      // Create a new stdClass object to hold the item properties
                                                    $itemCopy = new stdClass;

                                                    // Copy the item properties to the new object
                                                    foreach ($item->getAttributes() as $key => $value) {
                                                        $itemCopy->$key = $value;
                                                    }

                                                    // Modify the DateTime column to exclude the time part
                                                    if ($itemCopy->stat_date) {
                                                        // Convert the string to a Carbon instance
                                                        $dateTime = \Carbon\Carbon::parse($itemCopy->stat_date);

                                                        // Get the date part as a string
                                                        $dateString = $dateTime->format('Y-m-d');

                                                        // Update the stat_date property
                                                        $itemCopy->stat_date = $dateString;
                                                    }

                                                    return serialize($itemCopy);
                                                });

                                                // Reset the keys on the collection
                                                $uniqueCollection = $uniqueCollection->values();
                                                if(!empty($uniqueCollection)){
                                           
                                                    foreach($uniqueCollection as $one){
                                                        @$count[$one['stat_os']]++;
                                                        if($one['isCopy'] == 1){
                                                            $copy_link[] = $one['isCopy'];
                                                        }else{
                                                            $downloads[] = $one['isCopy'];
                                                        }
                                                    }
                                                }else{
                                                    $count = [];
                                                }
                                                $valueCounts = array_count_values($copy_link);
                                               
                                                ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td> {{ $nod->username }} (<b>{{ $nod->id }}</b>)</td>
                                            <!-- <td> <?= array_key_exists('windows', $count) ? $count['windows'] : '0' ?></td> -->
                                            <td> <?= count($copy_link); ?> </td>
                                            <td> <?= count($downloads); ?> </td>
                                            <td> <?= count($downloads)+count($copy_link); ?> </td>
                                            <td> <?php echo date('d-M-Y', strtotime('-1 day')); ?></td>

                                        </tr>
                                        <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
    </div>
@endsection
@include('internal_layout.footer')
