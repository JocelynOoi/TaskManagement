<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schedule;
use Carbon\Carbon;
use App\Models\Tasks;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskReminderMail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schedule::call(function(){
            // Send email to users who have tasks due tin 3 days
            $tasksDueSoon = Tasks::where('due_date','<=',Carbon::now()->addDays(3))
                                ->where('due_date','>',Carbon::now())
                                ->where('isComplete',false)
                                ->get();

            // Send email to users who have tasks in Overdue
            $taskOverDue = Task::where('due_date','<',Carbon::now())
                                    ->where('isComplete',false)
                                    ->get();
            
            foreach($taskDueSoon as $task){
                $messageContent = 'Your tasks "{$task->title}" is due on {$task->due_date}. Please complete it soon!';
                Mail::to('jocelynooi808@gmail.com')
                ->send(new TaskReminderMail($task,$messageContent));
            }

            foreach($taskOverDue as $task){
                $messageContent = 'Your tasks "{$task->title}" was due on {$task->due_date}. Please complete it soon!';
                Mail::to('jocelynooi808@gmail.com')
                ->send(new TaskReminderMail($task,$messageContent));
            }
        })->everyMinute();
    }
}
