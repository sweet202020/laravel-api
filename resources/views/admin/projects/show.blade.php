@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex gap-4">
            <div class="details text-light">
                <h1>{{ $project->title }}</h1>
                <p>{{ $project->description }}</p>
                @if ($project->cover_image)
                    <img src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                @else
                    <div class="placeholder-glow p-5 bg-danger">
                        placeholder
                    </div>
                @endif
                <div class="meta">
                    <div class="difficulty">
                        difficulty: {{ $project->difficulty }}
                    </div>
                    <div>
                        language:{{ $project->language }}
                    </div>
                    <div class="type">
                        type:{{ $project->type ? $project->type->name : 'nessun type selezionato, aggiungilo cliccando il bottone qui sotto' }}
                    </div>
                </div>

                <div class="technologies">
                    <span> technologies:</span>
                    @if (count($project->technologies) > 0)
                        @foreach ($project->technologies as $technology)
                            <span>{{ $technology->name }}</span>
                        @endforeach
                    @else
                        <span> No technology</span>
                    @endif
                </div>


            </div>
        </div>
        <a href="{{ route('admin.projects.edit', $project->slug) }}"><button class="btn btn-primary text-uppercase">edit
                project</button></a>
    </div>
@endsection
