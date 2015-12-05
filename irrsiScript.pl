#!/usr/bin/perl
use strict;
use Irssi;
use LWP::Simple;
use vars qw($VERSION %IRSSI);

$VERSION = "0.0.1";
%IRSSI = (
    authors     => "sando",
    contact     => "sando.t+irssi\@gmail.com",
    name        => "blameatron",
    description => "Need a name for your new project? Let the blameatron do it for you!",
    license     => "Public domain"
);

my $last;

sub sig_public {
  my ($server, $msg, $nick, $addr, $target) = @_;

  my $on = 0;
  my $blame = '';
  my $debug = Irssi::settings_get_bool('blameatron_debug');
  my @chans = split(/ /, Irssi::settings_get_str('blameatron_channels'));
  my $arguments = '';
  my $trigger = "^" . Irssi::settings_get_str("blameatron_trigger");

  return unless ($msg =~ m/$trigger/i );

#  Irssi::print("blameatron called by $nick");

  foreach my $ch (@chans) {
    if ($ch eq $target) {
      $on = 1; 
    }
  }

  if ($on == 0) {
    Irssi::print("blameatron: not enabled for $target") if ($debug == 1);
    return;
  }

  if (time < $last + Irssi::settings_get_int("blameatron_interval") && $nick ne "SirSquid" && $nick ne "wolfmother" && $nick ne "Wolfmuffin") {   # $nick ne "" so that the person running the script can do unlimited blames
    Irssi::print("blameatron: invoked but still below min interval") if ($debug == 1);
    return;
  }

  $arguments = $_[1];
  $arguments =~ s/!blame *//ig;
  if ($arguments ne '')
  {
    $blame = get("http://dongues.com/blameatron.php?raw=1&name=" . $arguments . "&blamer=" . $nick);
   # Irssi::print("someone was blamed: " . $arguments);
  }
  else
  {
    $blame = get("http://dongues.com/blameatron.php?raw=1&blamer=" . $nick);
   # Irssi::print("No one was blamed");
  }


  if ($blame eq '') {
    Irssi::print("blameatron: error getting string from http");
    return;
  }



  #   See if the command being returned from the server is an action, if so, strip the slash and send the action
  if ( $blame =~ m/^\/me/i )  {
    $blame =~ s/\/me //i;
    $server->command("action $target $blame");
  }
  else
  {
    $server->command("msg $target $blame");
  }
  $last = time;
}

sub sig_own_public {
  my ($server, $msg, $target) = @_;
  sig_public($server, $msg, "", "", $target);
}

Irssi::settings_add_str("misc", "blameatron_channels", "#respawnserverstuff #respawn");
Irssi::settings_add_str("misc", "blameatron_trigger", "!blame");
Irssi::settings_add_int("misc", "blameatron_interval", 15);
Irssi::settings_add_bool("misc", "blameatron_debug", 1);

Irssi::signal_add_last("message public", "sig_public");
Irssi::signal_add_last("message own_public", "sig_own_public");