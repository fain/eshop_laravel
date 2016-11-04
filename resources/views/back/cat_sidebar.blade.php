<div class="panel panel-default cat-sidebar">
    <div class="panel-heading">
        List of categories
    </div>
    <div class="panel-body">
        <a href="/backend/new_categories" class="btn-sm btn-info new_cat">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New Category
        </a>
        <hr>
        @if(count($treecat) > 0)
            @foreach($treecat as $tc)
                <ul class="list-unstyled">
                    @if(count($tc->subcat)>0)
                        <li class="maincat @if($currmenu==$tc->id)  currmenu @endif">
                            <a id="link_{{ strtolower($tc->id) }}" data-toggle="collapse" data-parent="#accordian" href="#{{ strtolower($tc->id) }}"  >
                                <i id="icon_{{ strtolower($tc->id) }}" class="fa @if(count($tc->subcat->where('id', $currmenu))>0) fa-minus-square @else fa-plus-square @endif" aria-hidden="true"></i>
                            </a>
                            <a class="maincat_link" href="{{ url($basecat_url.$tc->id) }}">{{ ucfirst(strtolower($tc->name)) }}</a>
                            <div id="{{ strtolower($tc->id) }}" class="panel-collapse collapse @if(count($tc->subcat->where('id', $currmenu))>0) in @endif" @if(count($tc->subcat->where('id', $currmenu))>0) aria-expanded="true" @endif>
                                <ul class="list-unstyled">
                                    @foreach ($tc->subcat as $sc)
                                        <li class="subcat @if($currmenu==$sc->id)  currmenu @endif"><i class="fa fa-square-o" aria-hidden="true"></i>
                                            <a id="link_{{ strtolower($tc->id) }}_subcat" class="link_subcat" href="{{ url($basecat_url.$sc->id) }}">{{ ucfirst(strtolower($sc->name)) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="maincat @if($currmenu==$tc->id)  currmenu @endif"><i class="fa fa-square" aria-hidden="true"></i>
                            <a href="{{ url($basecat_url.$tc->id) }}" class="maincat_link">{{ ucfirst(strtolower($tc->name)) }}</a></li>
                    @endif
                </ul>
            @endforeach
        @else
            <div class="alert alert-warning">Categories empty!</div>
        @endif
    </div>
</div>