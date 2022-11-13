<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="card">
    <div class="card-body py-2 px-3 border-bottom border-light">
        <div class="row justify-content-between py-1">
            <div class="col-sm-7">
                <div class="d-flex align-items-start">

                    <div>
                        <h5 class="mt-0 mb-0 font-15">
                            <a href="#" class="text-reset">{{ $to_user }}</a>
                        </h5>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="card-body">
        <ul class="conversation-list" data-simplebar style="max-height: 460px;">
            @foreach ($messages as $message)
                <li class="{{ $message->from_user == Auth::id() ? 'clearfix odd' : 'clearfix' }}">
                    <div class="chat-avatar">
                        <img src="/images/user.jpg" class="rounded" alt="img" />
                        <i>{{ $message->created_at }}</i>
                    </div>
                    <div class="conversation-text">
                        <div class="ctext-wrap">
                            <i>{{ $message->from_user == Auth::id() ? $from_user : $to_user }}</i>
                            <p>
                                {{ $message->message }}
                            </p>
                        </div>
                    </div>

                </li>
            @endforeach


        </ul>

        <div class="row">
            <div class="col">
                <div class="mt-2 bg-light p-3 rounded">
                    <form class="needs-validation" novalidate="" name="chat-form" id="chat-form">
                        @csrf
                        <div class="row">
                            <div class="col mb-2 mb-sm-0">
                                <input id="message" type="text" name="message" class="form-control border-0"
                                    placeholder="Enter your text" required />

                            </div>
                            <div class="col-sm-auto">
                                <div class="btn-group">

                                    <button type="submit" class="btn btn-success chat-send w-100"><i
                                            class="fe-send"></i></button>
                                </div>
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row-->
                    </form>
                </div>
            </div>
            <!-- end col-->
        </div>
        <!-- end row -->
    </div>
    <!-- end card-body -->
</div>
<script>

   function scrollIt() {
    $('.conversation-list .simplebar-content-wrapper').animate({ scrollTop: $(document).height() * 5 * $(document).height() }, 1200);
}

    $(document).ready(function() {
        scrollIt();
        $("#chat-form").on('submit', function(e) {
            e.preventDefault();

            let formData = $(this).serialize();

            $.ajax({
                method: "POST",
                url: "/message/send/" + to,
                data: formData,
                success: function(data) {
                    // alert();
                    $('#message').val('');
                    $("#" + to).click();
                    scrollIt();
                }
            })
        })
    })
</script>
