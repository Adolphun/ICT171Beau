#include <gtk/gtk.h>

#define NUM_DAYS 7

// Declare global variables
GtkWidget *numTasksEntry;
GtkWidget *taskNameEntry;
GtkWidget *taskDurationEntry;
GtkWidget *dayEntry;
GtkWidget *summaryLabel;

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

    // Update the task duration for the allocated day
    // ...

    // Update the summary label
    // ...

    // Clear the entry fields
    gtk_entry_set_text(GTK_ENTRY(taskNameEntry), "");
    gtk_entry_set_text(GTK_ENTRY(taskDurationEntry), "");
    gtk_entry_set_text(GTK_ENTRY(dayEntry), "");
}

int main(int argc, char *argv[]) {
    // Initialize GTK
    gtk_init(&argc, &argv);

    // Create the main window
    GtkWidget *window = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    gtk_window_set_title(GTK_WINDOW(window), "Task Scheduler");
    gtk_container_set_border_width(GTK_CONTAINER(window), 10);
    gtk_widget_set_size_request(window, 400, 300);
    g_signal_connect(window, "destroy", G_CALLBACK(gtk_main_quit), NULL);

    // Create a vertical box container
    GtkWidget *vbox = gtk_box_new(GTK_ORIENTATION_VERTICAL, 5);
    gtk_container_add(GTK_CONTAINER(window), vbox);

    // Create the entry fields and labels
    numTasksEntry = gtk_entry_new();
    taskNameEntry = gtk_entry_new();
    taskDurationEntry = gtk_entry_new();
    dayEntry = gtk_entry_new();
    GtkWidget *numTasksLabel = gtk_label_new("Number of Tasks:");
    GtkWidget *taskNameLabel = gtk_label_new("Task Name:");
    GtkWidget *taskDurationLabel = gtk_label_new("Task Duration (minutes):");
    GtkWidget *dayLabel = gtk_label_new("Day to Allocate Task (1-7):");

    // Create the "Add Task" button
    GtkWidget *addTaskButton = gtk_button_new_with_label("Add Task");
    g_signal_connect(addTaskButton, "clicked", G_CALLBACK(addTask), NULL);

    // Create the summary label
    summaryLabel = gtk_label_new("");

    // Add the widgets to the vertical box container
    gtk_box_pack_start(GTK_BOX(vbox), numTasksLabel, FALSE, FALSE, 0);
    gtk_box_pack_start(GTK_BOX(vbox), numTasksEntry, FALSE, FALSE, 0);
    gtk_box_pack_start(GTK_BOX(vbox), taskNameLabel, FALSE, FALSE, 0);
    gtk_box_pack_start(GTK_BOX(vbox), taskNameEntry, FALSE, FALSE, 0);
    gtk_box_pack_start(GTK_BOX(vbox), taskDurationLabel, FALSE, FALSE, 0);
    gtk_box_pack_start(GTK_BOX(vbox), taskDurationEntry, FALSE, FALSE, 0);
    gtk_box_pack_start(GTK_BOX(vbox), dayLabel, FALSE, FALSE, 0);
    gtk_box_pack_start(GTK_BOX(vbox), dayEntry, FALSE, FALSE, 0);
    gtk_box_pack_start(GTK_BOX(vbox), addTaskButton, FALSE, FALSE, 0);
    gtk_box_pack_start(GTK_BOX(vbox), summaryLabel, FALSE, FALSE, 0);

    // Show all the widgets
    gtk_widget_show_all(window);

    // Start the GTK main loop
    gtk_main();

    return 0;
}
