<h2>{{$job->title}}</h2>

<p>Congrats! Your Job is now live on our website!</p>

<p>
    <a href="{{ url('/jobs/'. $job->id) }}">View your job here!</a>
</p>

<div>
    Remember: Life is available only in the present moment. - Thich Nhat Hanh
</div>