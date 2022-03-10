<section id="projects" class="section m-16 mx-32">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-between">
            <div class="col-md-6">
                <div class="text-2xl font-bold inline-block">Recommended for you</div>
            </div>
            <div class="col-md-6 d-flex justify-content-end mt-4">
                <div class="search-field inline-flex">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" class="form-control" placeholder="search">
                </div>
            </div>
        </div>
    </div>

    <div class="row my-2">
        <div class="col-md-4 d-flex my-3">
            <div class="card shadow rounded-lg p-4">
                <div class="card-head d-flex align-items-center">
                    <img src="https://avatars.githubusercontent.com/u/1?v=4" class="ms-2 rounded-full" alt="" width="100px" height="100px">
                    <div class="flex-col align-items-center ms-4">
                        <div class="text-base">Tom Preston-Werner</div>
                        <div class="flex items-center">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <div class="ms-2">22K</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="text-2xl font-bold">Blogging Web application</h5>
                    <div class="text-base text-gray-500">Started 2 years ago</div>
                    <div class="text-xl">Some quick example for the project to build the web app and make up the bulk of the card's content.</div>
                    <div class="flex justify-content-end mt-4">
                        <div class="bg-gray-200 mr-2 rounded-lg p-2 px-3">HTML</div>
                        <div class="bg-gray-200 mr-2 rounded-lg p-2 px-3">CSS</div>
                        <div class="bg-gray-200 mr-2 rounded-lg p-2 px-3">Laravel</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@section('page-level-scripts')
    <script>

    $(document).ready(function () {

        function getRepo(repo_link) {
            return $.ajax({
                url: repo_link,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // console.log(data)
                    return data;
                }
            });
        }

        function getUser(user_link) {
            return $.ajax({
                url: user_link,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // console.log('getUser se', data)
                    return data;
                }
            });
        }

        function getLanguages(language_url) {
            return $.ajax({
                url: language_url,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // console.log(data)
                    return data;
                }
            });
        }

        function getRateLimit() {
            return $.ajax({
                url: 'https://api.github.com/rate_limit',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                }
            });
        }
        getRateLimit();
        function getProjectsJson() {
            $.ajax({
                url: 'https://api.github.com/repositories',
                method: "GET",
                dataType: 'json',
                success: function(success) {
                    for (i=0; i<20; ++i) {
                        index = Math.floor(Math.random() * 101);
                        var string;
                        var string = `<div class="col-md-4 d-flex my-3">
                        <div class="card shadow rounded-lg p-4">
                            <div class="card-head d-flex align-items-center">
                                <img src="${success[index].owner.avatar_url}" class="ms-2 rounded-full" alt="" width="100px" height="100px">
                                <div class="flex-col align-items-center ms-4">
                                    <div class="text-base">${getUser(success[index].owner.url)['name']}</div>
                                    <div class="flex items-center">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        <div class="ms-2">${getUser(success[index].owner.url)['followers']}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="text-2xl font-bold">${success[index].name}</h5>
                                <div class="text-base text-gray-500">${getRepo('https://api.github.com/repos/' + success[index].full_name)}</div>
                                <div class="text-xl">${success[index].description}</div>
                                <div class="flex justify-content-end mt-4">`
                                getLanguages(success[index].languages_url).done(function (data) {
                                    for(let key in data) {
                                        string += `<div class="bg-gray-200 mr-2 rounded-lg p-2 px-3">${key}</div>`;
                                    }
                                })
                                string += `</div>
                            </div>
                        </div>
                    </div>`;
                    }
            }});
        }

        getProjectsJson();
    });

    </script>
@endsection
