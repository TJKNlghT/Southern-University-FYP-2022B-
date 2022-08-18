<x-menu-layout>
    <div class="selectionmenu container">
        <div class="row gx-3 justify-content-center px-2 py-5">
            <div class="col-6">
                <a href="{{route('viewmenu')}}">
                <div class="menu1 d-flex bg-image card rounded-2 px-2 shadow">
                    <div>
                        <h3>Sushi Menu</h3>
                        <p>Select a different variety of delicious sushi from our menu!</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-6">
                <a href="{{route('createownsushi')}}">
                <div class="menu2 d-flex bg-image card shadow rounded-2 px-2">
                    <div>
                        <h4>Create Your Own Sushi</h4>
                        <p>Be your own chef and create your own sushi!</p>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-12 py-3 px-3">
                <a href="/">
                <div class="menu3 d-flex justify-content-center bg-image card shadow rounded-2 p-2">
                    <div>
                        <h4>Back</h4>
                        <p>Return to home menu.</p>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
</x-menu-layout>