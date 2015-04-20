@extends('admin.base')

@section('content')
    @include('admin.partials.navbar')
    <div class="container">
        <header class="client-page-header clearfix">
            <h1 class="content-header">A Brief from {{ $generalBrief->company }}</h1>
        </header>
        <ul class="task-vitals brief-vitals">
            <li>
                <span class="fa fa-suitcase"></span><span> {{ $generalBrief->industry }}</span>
            </li>
            <li>
                <span class="fa fa-globe"></span><span> {{ $generalBrief->current_website }}</span>
            </li>
            <li>
                <span class="fa fa-user"></span><span> {{ $generalBrief->contact_person }}</span>
            </li>
            <li>
                <span class="fa fa-envelope"></span><span> {{ $generalBrief->email }}</span>
            </li>
        </ul>
        <hr class="content-divider"/>
        <div class="row">
            <div class="col-md-4 brief-client-outline">
                <h3>Our Background</h3>
                <p>{{ $generalBrief->background }}</p>
            </div>
            <div class="col-md-4 brief-client-outline">
                <h3>Our target market</h3>
                <p>{{ $generalBrief->reaction }}</p>
            </div>
            <div class="col-md-4 brief-client-outline">
                <h3>Us in a nutshell</h3>
                <p>{{ $generalBrief->nutshell }}</p>
            </div>
        </div>
        <ul class="nav nav-tabs task-tab-bar" role="tablist" id="subBriefTabs">
            @if($generalBrief->logoBriefs->count())
                <li role="presentation">
                    <a href="#logo" aria-controls="logo" role="tab" data-toggle="tab">Logo Brief</a>
                </li>
            @endif
            @if($generalBrief->siteBriefs->count())
                <li role="presentation">
                    <a href="#website" aria-controls="website" role="tab" data-toggle="tab">Web Brief</a>
                </li>
            @endif
            @if($generalBrief->printBriefs->count())
                <li role="presentation">
                    <a href="#print" aria-controls="print" role="tab" data-toggle="tab">Print Brief</a>
                </li>
            @endif
        </ul>

        <div class="tab-content">
            @if($generalBrief->logoBriefs->count())
            <div role="tabpanel" class="task-tab-content tab-pane fade in active" id="logo">
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam blanditiis debitis, eveniet fugit
                    in magnam neque perspiciatis quam repudiandae. Delectus dignissimos distinctio dolorum, eveniet
                    exercitationem natus officia praesentium similique voluptatibus?
                </div>
                <div>Aliquid asperiores consequuntur cum ducimus fuga fugit neque quaerat sequi! Culpa ex inventore modi
                    nesciunt obcaecati perferendis quaerat quas! Blanditiis, dolores doloribus facere facilis fugiat id
                    itaque laudantium maxime nesciunt!
                </div>
                <div>Consectetur consequuntur dignissimos et illo magni neque nostrum quisquam ratione rerum sint? In,
                    labore, officiis! Aperiam dignissimos dolores explicabo itaque laboriosam optio recusandae
                    repudiandae voluptatem. Ab architecto cupiditate deserunt quidem.
                </div>
                <div>At dignissimos facere facilis incidunt quam quas reiciendis. Cupiditate id porro voluptas. Ex sed,
                    similique. Ab accusamus aut consectetur doloribus enim exercitationem facilis hic maxime minus
                    necessitatibus neque quisquam, voluptatibus!
                </div>
                <div>Atque debitis distinctio repudiandae vero. Dolorum hic ipsum maiores nemo non perferendis similique
                    sit sunt ullam. Adipisci consequuntur distinctio, eveniet harum ipsam placeat praesentium quas quia
                    quis repudiandae, saepe sunt?
                </div>
            </div>
            @endif
            @if($generalBrief->siteBriefs->count())
            <div role="tabpanel" class="task-tab-content tab-pane fade" id="website">
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi doloribus eos ex fugit,
                    hic, id, illo itaque mollitia natus nisi quasi quisquam quos similique suscipit ut vel voluptates
                    voluptatibus.
                </div>
                <div>Amet aperiam expedita natus odio officia perferendis placeat porro, quaerat, quam quia quidem
                    quisquam tempore ut velit voluptas voluptatem voluptatum? Aperiam asperiores consectetur fugiat
                    impedit mollitia, obcaecati placeat porro quasi.
                </div>
                <div>Accusantium, aperiam at deserunt distinctio, ducimus inventore ipsam magnam molestiae mollitia
                    neque nisi odio pariatur provident quaerat quasi ratione repellendus saepe temporibus, ut vel
                    voluptate voluptates voluptatibus? Accusamus, facere, ipsam.
                </div>
                <div>Accusamus blanditiis cupiditate distinctio dolores, et hic iure labore laudantium maiores mollitia,
                    nemo, nobis quae quam quia repellendus temporibus totam voluptatem! Asperiores molestiae officia
                    quibusdam quisquam sequi? Necessitatibus, temporibus, voluptatibus!
                </div>
                <div>Asperiores, dolore excepturi hic neque odit quis voluptas! Animi aperiam atque error eum magnam
                    nemo officia quisquam repudiandae similique? Consectetur cum dolore dolores fugit iusto minus
                    perferendis possimus quibusdam sed?
                </div>
            </div>
            @endif
            @if($generalBrief->printBriefs->count())
            <div role="tabpanel" class="task-tab-content tab-pane fade" id="print">
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aspernatur cupiditate eligendi eum
                    facere fuga iste minima molestiae nam, omnis perspiciatis qui quidem quos suscipit ut vel,
                    voluptatibus! Impedit, ipsum.
                </div>
                <div>Accusamus accusantium aperiam at autem corporis culpa dignissimos dolore explicabo fugit ipsam
                    laborum laudantium magnam, magni nam nihil non numquam officiis quasi quidem quod reiciendis
                    repudiandae saepe sunt velit voluptatem?
                </div>
                <div>At atque aut autem dolorem eaque esse hic inventore ipsa magni, natus provident quis recusandae
                    reprehenderit rerum saepe soluta voluptatibus! Ad, autem dicta dolorum fugit ipsa odio quam ut
                    veritatis.
                </div>
                <div>Doloribus enim harum rem soluta. A accusantium beatae commodi cumque eos et ipsa iste iure,
                    laboriosam maxime mollitia necessitatibus nihil, obcaecati perspiciatis quae reiciendis repellat
                    repellendus saepe sint voluptates voluptatibus.
                </div>
                <div>Delectus, minima, rerum? A deleniti dicta esse est fuga illum impedit, ipsam ipsum iure laboriosam
                    magni neque obcaecati quam ratione saepe sequi suscipit, temporibus velit voluptas, voluptatem? Fuga
                    fugiat, perspiciatis?
                </div>
            </div>
            @endif
        </div>
    </div>

@endsection

@section('bodyscripts')
    @parent
    <script>
        $(function () {
            $('#subBriefTabs a:first-of-type').tab('show')
        })
    </script>
@endsection