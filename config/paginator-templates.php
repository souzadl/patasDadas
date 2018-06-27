<?php
return [
    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}" aria-label="Next"><span aria-hidden="true">&raquo;</span><span class="sr-only">{{text}}</span></a></li>',
    'nextDisabled' => '<li class="page-item next disabled"><a class="page-link" href="{{url}}" aria-label="Next"><span aria-hidden="true">&raquo;</span><span class="sr-only">{{text}}</span></a></li>',
    'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}" aria-label="Previous"><span aria-hidden="true">&laquo;</span><span class="sr-only">{{text}}</span></a></li>',
    'prevDisabled' => '<li class="page-item prev disabled"><a class="page-link" href="{{url}}" aria-label="Previous"><span aria-hidden="true">&laquo;</span><span class="sr-only">{{text}}</span></a></li>'
];