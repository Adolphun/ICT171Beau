// Function to add a task
void addTask(GtkWidget *widget, gpointer data) {
    // Get the values from the entry fields
    const gchar *numTasksStr = gtk_entry_get_text(GTK_ENTRY(numTasksEntry));
    const gchar *taskNameStr = gtk_entry_get_text(GTK_ENTRY(taskNameEntry));
    const gchar *taskDurationStr = gtk_entry_get_text(GTK_ENTRY(taskDurationEntry));
    const gchar *dayStr = gtk_entry_get_text(GTK_ENTRY(dayEntry));

    // Convert the day string to an integer
    int day = 0;
    if (g_strcmp0(dayStr, "Monday") == 0) {
    } else if (g_strcmp0(dayStr, "Tuesday") == 0) {
        day = 2;
    } else if (g_strcmp0(dayStr, "Wednesday") == 0) {
        day = 3;
    } else if (g_strcmp0(dayStr, "Thursday") == 0) {
        day = 4;
    } else if (g_strcmp0(dayStr, "Friday") == 0) {
        day = 5;
    } else if (g_strcmp0(dayStr, "Saturday") == 0) {
        day = 6;
    } else if (g_strcmp0(dayStr, "Sunday") == 0) {
        day = 7;
    } else {
        // Invalid day entered
        gtk_label_set_text(GTK_LABEL(summaryLabel), "Invalid day entered");
        return;
    }

    // Convert the task duration string to an integer
    int taskDuration = atoi(taskDurationStr);
    // Convert minutes to hours
    int taskDurationHours = taskDuration / 60;

    // Add your task processing logic here

    // Clear the entry fields
    gtk_entry_set_text(GTK_ENTRY(numTasksEntry), "");
    gtk_entry_set_text(GTK_ENTRY(taskNameEntry), "");
    gtk_entry_set_text(GTK_ENTRY(taskDurationEntry), "");
    gtk_entry_set_text(GTK_ENTRY(dayEntry), "");

    // Update the summary label
    gtk_label_set_text(GTK_LABEL(summaryLabel), "Task added successfully");
}
