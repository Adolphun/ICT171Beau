// Callback function for the "Add Task" button
void addTask(GtkWidget *widget, gpointer data) {
    // Get the number of tasks from the entry field
    int numTasks = atoi(gtk_entry_get_text(GTK_ENTRY(numTasksEntry)));

    // Get the task name from the entry field
    const char *taskName = gtk_entry_get_text(GTK_ENTRY(taskNameEntry));

    // Get the task duration from the entry field
    int taskDuration = atoi(gtk_entry_get_text(GTK_ENTRY(taskDurationEntry)));

    // Get the day to allocate the task from the entry field
    int day = atoi(gtk_entry_get_text(GTK_ENTRY(dayEntry)));

    // Clear the entry fields
    gtk_entry_set_text(GTK_ENTRY(taskNameEntry), "");
    gtk_entry_set_text(GTK_ENTRY(taskDurationEntry), "");
    gtk_entry_set_text(GTK_ENTRY(dayEntry), "");
}