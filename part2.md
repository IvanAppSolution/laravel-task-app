Part 2 — Code Review & Debug  
A. Laravel Snippet
public function store(Request $request)
 {
 	$task = Task::create($request->all());
 	return response()->json($task);
 }
Questions:
1. What issues do you see in this implementation? 
Answer: The store function has no request input validator to check the requirements and that will notify the user if there are any issues in the submitted request.

 2. How would you improve it for security and maintainability?
Answer: A better approach is to include the Laravel FormRequest validation to check the required fields and if it is valid or not.


Part 3 — System Design  
Answer briefly in a file named DESIGN.md:
 1. How would you scale this app for 100k+ users?
 Answer: I would recommend using Nginx web server with Laravel Octane to boost the speed and handle large scale user requests.

 2. How would you implement background jobs (e.g., reminders)?
Answer: In the backend laravel server I can implement Jobs/ Queues for batch process that will do its job separately without pausing the processing until if finished. I can also make a Laravel schedule like a cron to do a task process in a given time.

 3. How would you optimize database queries and caching?
Answer: The best ways to optimize a database are to normalize, indexing and apply query optimizations.And using caching like redis to store query results that are often requested to avoid checking the database too often to save time and processing.
